<?php

namespace Sang\CarForRent\Controller;

use Sang\CarForRent\Http\Request;
use Sang\CarForRent\Http\Response;
use Sang\CarForRent\Service\CarService;
use Sang\CarForRent\Service\UploadFileService;
use Sang\CarForRent\Transformer\CarTransformer;
use Sang\CarForRent\Validation\CarValidation;
use Sang\CarForRent\Validation\ImageValidation;

class CarController extends BaseController
{
    const TARGET_DIR = 'img/';
    private CarValidation $carValidation;
    private CarService $carService;
    private ImageValidation $imgValidation;
    private UploadFileService $uploadFileService;
    private CarTransformer $carTransformer;

    public function __construct(Request           $request,
                                Response          $response,
                                CarValidation     $carValidation,
                                CarService        $carService,
                                ImageValidation   $imgValidation,
                                UploadFileService $uploadFileService,
                                CarTransformer    $carTransformer,
    )
    {
        parent::__construct($request, $response);
        $this->carValidation = $carValidation;
        $this->carService = $carService;
        $this->imgValidation = $imgValidation;
        $this->uploadFileService = $uploadFileService;
        $this->carTransformer = $carTransformer;
    }

    public function addCar(): Response
    {
        if ($this->request->isPost()) {
            $params = $this->getParams();
            $this->validateFormData($params);
            $result = $this->uploadFileService->upLoadFile($this->getImg());
            if (isset($result['img-error'])) {
                return $this->response->view('addCarForm', $result);
            } else {
                $params = array_merge($params, ["img" => $result]);
                var_dump($params['img']);
                $this->carTransformer->toObject($params);
                $this->carService->createCar($this->carTransformer);
            }
            return $this->backHome();
        }
        return $this->response->view('addCarForm');
    }

    public function getParams(): array
    {
        $params = $this->request->getFormParams();
        $carImg = $this->getImg();
        return array_merge($params, ["img" => $carImg['name']]);
    }

    public function getImg()
    {
        return $this->request->getFiles()['img'];
    }

    public function validateFormData($params): Response
    {
        $errors = [];
        $this->carValidation->loadData($params);
        if (!$this->carValidation->validate()) {
            $errors = $this->carValidation->getErrors();
        }
        $imgValidate = $this->imgValidation->validate($this->getImg(), 322);
        if ($imgValidate) {
            $errors =  array_merge($errors,  $imgValidate);
        }
        return $this->response->view('addCarForm',$errors);
    }

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
