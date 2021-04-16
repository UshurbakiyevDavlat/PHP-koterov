<?php
    class View {
        protected $pages = [];
        protected $title = 'Contacts';
        protected $body = "Inner data of Contacts";

        public function addPage($page,$pageCallback){
            $this->pages[$page] = $pageCallback->bindTo($this,__CLASS__);
        }

        public function render($page){
            $this->pages[$page]();
            $content = <<<HTML
                <!Doctype html>
                <html lang = 'en'>
                <head>
                <title>{$this->title()}</title>
                <meta charset = 'utf-8'>
                </head>
                <body>
                    <p>{$this->body()}</p>
                </body>
                </html>
                HTML;
                    echo $content;
        }
        public function title(){
            return htmlspecialchars($this->title);
        }

        public function body(){
            return nl2br(htmlspecialchars($this->body));
        }

    }

    $view = new View();
    $view -> addPage('about',function(){
        $this -> title = "About us";
        $this -> body = "Inner data of about us page";
    });
    $view->render('about');
    





?>