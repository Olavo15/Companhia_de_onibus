<?php 

require_once __DIR__. '/src/routers/routerSwitch.php';

class router extends routerSwitch{
    public function run(string $requestUri){

        $method = $_SERVER["REQUEST_METHOD"];

        $requestUri = ltrim($requestUri, '/');

        switch ($requestUri) {
            case 'onibus':
                switch ($method) {
                    case "POST":
                        $this->createRouter(); 
                        break;
                    case "GET":
                        $this->busManyRouter();
                        break;
                    default:
                        http_response_code(405);
                        echo json_encode(["mensagem" => "Método não permitido"]);
                        break;
                }
                break;

            case strpos($requestUri, 'onibus/search') === 0:
                $this->onibusById();
                break;

            case 'viagens':
                $this->listaViagens();
                break;
                
            case 'viagem':
                switch ($method) {
                    case "POST":
                        $this->novaViagem(); 
                        break;
                    default:
                        http_response_code(405);
                        echo json_encode(["mensagem" => "Método não permitido"]);
                        break;
                }
                break;
                
            case strpos($requestUri, 'assento/search') === 0:
                $this->assentoOnibus();
                break;

            default:
                http_response_code(404);
                echo json_encode(["mensagem" => "Rota não encontrada"]);
                break;
        }
    }
}



// php -S localhost:8080