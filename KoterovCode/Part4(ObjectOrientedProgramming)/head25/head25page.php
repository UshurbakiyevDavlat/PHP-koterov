<?php
    namespace PHP7;

        use \PHP7\Seo as Seo;
        use \PHP7\Tag as Tag;

        class Page{
            use Seo,Tag;

            protected $title;
            protected $content;

            public function __construct($title ='',$content =''){
                $this -> title = $title;
                $this -> content = $content;
            }
        }

?>