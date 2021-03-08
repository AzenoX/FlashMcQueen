<?php

namespace AzenoX;

class FlashMcQueen
{

    /**
     * Default types
     *
     * Contains:
     * - type
     * - icon
     * - color
     *
     * */
    const DEFAULT_TYPES = [
        'ERROR' => [
            'type' => 'error',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>',
            'color' => '#F44336',
        ],
        'WARNING' => [
            'type' => 'warning',
            'icon' => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 0l-2.138 2.63-3.068-1.441-.787 3.297-3.389.032.722 3.312-3.039 1.5 2.088 2.671-2.088 2.67 3.039 1.499-.722 3.312 3.389.033.787 3.296 3.068-1.441 2.138 2.63 2.139-2.63 3.068 1.441.786-3.296 3.39-.033-.722-3.312 3.038-1.499-2.087-2.67 2.087-2.671-3.038-1.5.722-3.312-3.39-.032-.786-3.297-3.068 1.441-2.139-2.63zm0 15.5c.69 0 1.25.56 1.25 1.25s-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25.56-1.25 1.25-1.25zm1-1.038v-7.462h-2v7.462h2z"/></svg>',
            'color' => '#FF9800',
        ],
        'SUCCESS' => [
            'type' => 'success',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>',
            'color' => '#4CAF50',
        ],
        'INFO' => [
            'type' => 'info',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-.001 5.75c.69 0 1.251.56 1.251 1.25s-.561 1.25-1.251 1.25-1.249-.56-1.249-1.25.559-1.25 1.249-1.25zm2.001 12.25h-4v-1c.484-.179 1-.201 1-.735v-4.467c0-.534-.516-.618-1-.797v-1h3v6.265c0 .535.517.558 1 .735v.999z"/></svg>',
            'color' => '#009688',
        ],
    ];

    /**
     * Default Type for messages
     */
    const DEFAULT_TYPE = 'INFO';


    /**
     * FlashMcQueen constructor.
     */
    public function __construct(){
        if(!array_key_exists('flashmcqueen', $_SESSION)){
            $_SESSION['flashmcqueen'] = [];
        }
    }


    /**
     * Add a success flash
     *
     * @param string $msg
     * @param bool $persistent
     * @param array $delays
     * @param bool $floatingIcon
     */
    public function success(string $msg, bool $persistent = false, array $delays = [], bool $floatingIcon = false): void{
        $this->add($msg, 'SUCCESS', $persistent, $delays['stay'] ?? 5, $delays['fadeIn'] ?? 1, $delays['fadeOut'] ?? 1, $floatingIcon);
    }

    /**
     * Add an error flash
     *
     * @param string $msg
     * @param bool $persistent
     * @param array $delays
     * @param bool $floatingIcon
     */
    public function error(string $msg, bool $persistent = false, array $delays = [], bool $floatingIcon = false): void{
        $this->add($msg, 'ERROR', $persistent, $delays['stay'] ?? 5, $delays['fadeIn'] ?? 1, $delays['fadeOut'] ?? 1, $floatingIcon);
    }

    /**
     * Add a warning flash
     *
     * @param string $msg
     * @param bool $persistent
     * @param array $delays
     * @param bool $floatingIcon
     */
    public function warning(string $msg, bool $persistent = false, array $delays = [], bool $floatingIcon = false): void{
        $this->add($msg, 'WARNING', $persistent, $delays['stay'] ?? 5, $delays['fadeIn'] ?? 1, $delays['fadeOut'] ?? 1, $floatingIcon);
    }

    /**
     * Add an information flash
     *
     * @param string $msg
     * @param bool $persistent
     * @param array $delays
     * @param bool $floatingIcon
     */
    public function info(string $msg, bool $persistent = false, array $delays = [], bool $floatingIcon = false): void{
        $this->add($msg, 'INFO', $persistent, $delays['stay'] ?? 5, $delays['fadeIn'] ?? 1, $delays['fadeOut'] ?? 1, $floatingIcon);
    }

    /**
     * Add a custom flash. Need an icon and a color.
     *
     * @param string $msg
     * @param string $icon
     * @param string $color
     * @param bool $persistent
     * @param array $delays
     * @param bool $floatingIcon
     */
    public function custom(string $msg, string $icon, string $color, bool $persistent = false, array $delays = [], bool $floatingIcon = false): void{
        $this->add($msg, 'INFO', $persistent, $delays['stay'] ?? 5, $delays['fadeIn'] ?? 1, $delays['fadeOut'] ?? 1, $floatingIcon, $icon, $color);
    }


    /**
     * Display flash messages
     *
     * @param bool $clearAfter
     * @param array $types
     */
    public function display(bool $clearAfter = true, array $types = []){

        if($types === [])
            $types = self::DEFAULT_TYPES;


        echo '<div class="flashmcqueen__wrapper">';

        foreach($types as $type => $typeData){

            if(!empty($_SESSION['flashmcqueen'][$type])){
                foreach($_SESSION['flashmcqueen'][$type] as $msg){

                    echo '
                        <div class="flashmcqueen__wrapper_msg ' . ($msg['persistent'] ? 'flashmcqueen_persist' : '') . '" 
                            style="
                            --fadeIn: '.$msg['fadeIn'].'s;
                            --fadeOut: '.$msg['fadeOut'].'s;
                            --stay: '.$msg['time'].'s;
                            border-color: '.$msg['color'].';
                            background: '.$msg['color'].';
                            "
                            data-time="' . $msg['time'] . '"
                            data-fadeOut="' . $msg['fadeOut'] . '"
                            data-stay="' . $msg['time'] . '">
                        
                                <p>'.$msg['msg'].'</p>
                                
                                <span
                                    class="flashmcqueen_icon flashmcqueen_icon_'. $typeData['type'] .''.($msg['floatingIcon'] ? 'flashmcqueen_floating' : '').'" 
                                    style="fill: '.$msg['color'].'">
                                    '.$msg['icon'].'
                                </span>
                                
                                '.($msg['persistent'] ? '
                                    <span class="close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 16.538l-4.592-4.548 4.546-4.587-1.416-1.403-4.545 4.589-4.588-4.543-1.405 1.405 4.593 4.552-4.547 4.592 1.405 1.405 4.555-4.596 4.591 4.55 1.403-1.416z"/>
                                        </svg>
                                    </span>
                                ' : '').'
                                
                        </div>
                    ';

                }
            }
        }

        if($clearAfter)
            $this->clear($types);

        echo '</div>';


        //Print needed script
        echo '<script>

            const flashmcqueen_remove = (el) => {
                let animation = el.animate(
                    [
                        {opacity:1},
                        {opacity:0}
                    ],
                    {
                        duration: parseInt(el.getAttribute(\'data-fadeOut\')) * 1000,
                        fill: "forwards"
                    }
                );
                animation.finished.then(() => el.remove());
            };

            const persistent = document.querySelectorAll(\'.flashmcqueen__wrapper_msg:not(.flashmcqueen_persist)\');
            persistent.forEach((el) => {
                setTimeout(() => {
                    flashmcqueen_remove(el);
                }, parseInt(el.getAttribute(\'data-stay\')) * 1000);
            });

            const closeBtns = document.querySelectorAll(\'.flashmcqueen__wrapper_msg.flashmcqueen_persist .close\');
            closeBtns.forEach((el) => {
                el.addEventListener(\'click\', () => flashmcqueen_remove(el.parentElement)); 
            });

        </script>';


    }



    /**
     * FlashMcQueen Destructor
     */
    public function __destruct(){
        $this->clear();
    }



    /*==============================================

        Utilities functions

    ==============================================*/
    /**
     * @param string $type
     * @return bool
     */
    protected function hasMessages(string $type): bool
    {
        return isset($_SESSION['flashmcqueen'][$type]);
    }


    /**
     * @param string $msg
     * @param string $type
     * @param bool $persistent
     * @param float $time
     * @param float $fadeIn
     * @param float $fadeOut
     * @param bool $floatingIcon
     * @param string|null $icon
     * @param string|null $color
     */
    protected function add(string $msg, string $type, bool $persistent, float $time = 5, float $fadeIn = 1, float $fadeOut = 1, bool $floatingIcon = false, string $icon = NULL, string $color = NULL){

        /*Secure $msg*/
        $msg = htmlentities($msg);

        /*If specified type does not exist, replace it by the default value*/
        if(!array_key_exists($type, self::DEFAULT_TYPES))
            $type = self::DEFAULT_TYPE;


        if($icon === null)
            $icon = self::DEFAULT_TYPES[$type]['icon'];

        if($color === null)
            $color = self::DEFAULT_TYPES[$type]['color'];


        /*If table does not exist, create an empty table*/
        if(!$this->hasMessages($type))
            $_SESSION['flashmcqueen'][$type] = [];

        /*Then add the message*/
        $_SESSION['flashmcqueen'][$type][] = ['msg' => $msg, 'persistent' => $persistent, 'icon' => $icon, 'color' => $color, 'time' => $time, 'fadeIn' => $fadeIn, 'fadeOut' => $fadeOut, 'floatingIcon' => $floatingIcon];

    }


    /**
     * @param array $types
     */
    protected function clear($types = []){
        if($types === [])
            $types = array_keys(self::DEFAULT_TYPES);
        else
            $types = array_keys($types);


        foreach($types as $type){
            unset($_SESSION['flashmcqueen'][$type]);
        }
    }


}