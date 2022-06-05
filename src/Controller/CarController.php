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
            $formData = $this->getFormData();
            $this->carValidation->loadData($formData);
            if (!$this->carValidation->validate()) {
                return $this->response->view('addCarForm', ['errors' => $this->carValidation]);
            }
            $imgValidate = $this->imgValidation->validate($this->getImg(), 210000);
            if ($imgValidate) {
                return $this->response->view('addCarForm', $imgValidate);
            }
            $result = $this->uploadFileService->upLoadFile($this->getImg());
            if (isset($result['imgerrors'])) {
                return $this->response->view('addCarForm', $result);
            } else {
                $formData = array_merge($formData, ["img" => $result]);
                $this->carTransformer->toObject($formData);
                $this->carService->createCar($this->carTransformer);
            }
            return $this->index();
        }
        return $this->response->view('addCarForm', ['errors' => $this->carValidation]);
    }

    public function getFormData(): array
    {
        $params = $this->request->getFormParams();
        $carImg = $this->getImg();
        return array_merge($params, ["img" => $carImg['name']]);
    }

    public function getImg()
    {
       return $this->request->getFiles()['img'];
    }

    public function index()
    {
        $carList = $this->carService->listCar();
        $countCar = $this->carService->countCar();
        $this->response->redirect('/');
        return $this->response->view('home', ['list' => $carList,
            'count' => $countCar
        ]);
    }
}
