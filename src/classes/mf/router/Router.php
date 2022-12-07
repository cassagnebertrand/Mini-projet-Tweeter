<?php

namespace iutnc\mf\router;




use iutnc\mf\auth\AbstractAuthentification;

class Router extends AbstractRouter
{

    public function addRoute(string $name, string $action, string $ctrl, int $level): void
    {
        self::$routes[$action] = [$ctrl,$level];
        self::$aliases[$name] = $action;
    }

    public function setDefaultRoute(string $action): void
    {
        self::$aliases['default'] = $action;
    }

    public function run(): void
    {

        if (!isset($this->request->get['action'])){
            $arrayDefaultCtrl = self::$routes[self::$aliases['default']];
            $stringDefaultCtrl = $arrayDefaultCtrl[0];
            $defaultCtrlObj = new $stringDefaultCtrl;
            $defaultCtrlObj->execute();
        }else{
            $actionValue = $this->request->get['action'];
            if (isset(self::$routes[$actionValue])){
                $dataSelectedCtrl = self::$routes[$actionValue];
                $stringSelectedCtrl = $dataSelectedCtrl[0];
                $levelSelectedCtrl = $dataSelectedCtrl[1];


                if (AbstractAuthentification::checkAccessRight($levelSelectedCtrl)){

                    $selectedCtrlObj = new $stringSelectedCtrl;
                    $selectedCtrlObj->execute();
                }else{
                    $arrayDefaultCtrl = self::$routes[self::$aliases['default']];
                    $stringDefaultCtrl = $arrayDefaultCtrl[0];
                    $defaultCtrlObj = new $stringDefaultCtrl;
                    $defaultCtrlObj->execute();
                }
            }else{
                $arrayDefaultCtrl = self::$routes[self::$aliases['default']];
                $stringDefaultCtrl = $arrayDefaultCtrl[0];
                $defaultCtrlObj = new $stringDefaultCtrl;
                $defaultCtrlObj->execute();
            }
        }

    }

    static public function executeRoute($alias){
        $arrayDefaultCtrl = self::$routes[self::$aliases[$alias]];
        $stringDefaultCtrl = $arrayDefaultCtrl[0];
        $defaultCtrlObj = new $stringDefaultCtrl;
        $defaultCtrlObj->execute();
    }

    public function urlFor(string $name, array $params = []): string
    {
        $stringName = self::$aliases[$name];
        $urlConstruct = $this->request->script_name.'?action='.$stringName;


        foreach ($params as $param){

            $urlConstruct .= '&amp;'.$param[0].'='.$param[1];
        }


        return $urlConstruct;
    }
}