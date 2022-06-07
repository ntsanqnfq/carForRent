<?php

namespace Sang\CarForRent\Controller\Api;

use Sang\CarForRent\Controller\BaseController;
use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Http\Response;
use Sang\CarForRent\Service\CarService;
use Sang\CarForRent\Service\UploadFileService;
use Sang\CarForRent\Transformer\CarTransformer;
use Sang\CarForRent\Validation\CarValidation;

class AddCarApiController extends BaseController
{
    const TARGET_DIR = 'img/';
    private CarValidation $carValidation;
    private CarService $carService;
    private UploadFileService $uploadFileService;
    private CarTransformer $carTransformer;

    public function __construct(Request           $request,
                                Response          $response,
                                CarValidation     $carValidation,
                                CarService        $carService,
                                UploadFileService $uploadFileService,
                                CarTransformer    $carTransformer
    )
    {
        parent::__construct($request, $response);
        $this->carValidation = $carValidation;
        $this->carService = $carService;
        $this->uploadFileService = $uploadFileService;
        $this->carTransformer = $carTransformer;
    }

    public function addCar(): Response
    {
        $params = $this->getParams();
        $errors = $this->validateFormData($params);
        if (empty($errors)) {
            $errors = $this->uploadFileService->upLoadFile($this->getImg());
        }
        if (is_string($errors)) {
            $params = array_merge($params, ["img" => $errors]);
            $this->carTransformer->toObject($params);
            $this->carService->createCar($this->carTransformer);
            return $this->response->success([
                'success'=>'completely add a car'
            ]);
        }
        return $this->response->error($errors);
    }

    private function getParams(): array
    {
        $params = $this->request->getFormParams();
        $carImg = $this->getImg();
        return array_merge($params, ["img" => $carImg['name']]);
    }

    private function getImg()
    {
        return $this->request->getFiles()['img'];
    }

    private function validateFormData($params): array
    {
        $errors = [];
        $this->carValidation->loadData($params);
        if (!$this->carValidation->validate()) {
            $errors = $this->carValidation->getErrors();
        }
        return $errors;
    }
}