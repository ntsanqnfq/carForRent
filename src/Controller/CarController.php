<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Http\Response;
use Sang\CarForRent\Service\CarService;
use Sang\CarForRent\Service\UploadFileService;
use Sang\CarForRent\Transformer\CarTransformer;
use Sang\CarForRent\Validation\CarValidation;

class CarController extends BaseController
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
                                CarTransformer    $carTransformer,
    )
    {
        parent::__construct($request, $response);
        $this->carValidation = $carValidation;
        $this->carService = $carService;
        $this->uploadFileService = $uploadFileService;
        $this->carTransformer = $carTransformer;
    }

    /**
     * @return Response
     */
    public function addCar(): Response
    {
        $errors = [];
        if ($this->request->isPost()) {
            $params = $this->getParams();
            $errors = $this->validateFormData($params);
            if (empty($errors)) {
                $errors = $this->uploadFileService->upLoadFile($this->getImg());
            }
            if (is_string($errors)) {
                $params = array_merge($params, ["img" => $errors]);
                $this->carTransformer->toObject($params);
                $this->carService->createCar($this->carTransformer);
                return $this->backHome();
            }
        }
        return $this->response->view('addCarForm', $errors);
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        $params = $this->request->getFormParams();
        $carImg = $this->getImg();
        return array_merge($params, ["img" => $carImg['name']]);
    }

    /**
     * @return array
     */
    public function getImg(): array
    {
        return $this->request->getFiles()['img'];
    }

    /**
     * @param $params
     * @return array
     */
    public function validateFormData($params): array
    {
        $errors = [];
        $this->carValidation->loadData($params);
        if (!$this->carValidation->validate()) {
            $errors = $this->carValidation->getErrors();
        }
        return $errors;
    }

    /**
     * @return Response
     */
    public function backHome(): Response
    {
        $carList = $this->carService->listCar();
        $countCar = $this->carService->countCar();
        $this->response->redirect('/');
        return $this->response->view('home', ['list' => $carList,
            'count' => $countCar
        ]);
    }
}
