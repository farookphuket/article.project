# article.project


> article.project is the laravel base using sqlite database.
> created on 16 Sep 2020


##  NOTE

-   every little thing n this file if it right after or below the line is a new thing it is may or may-not concern to the thing above the line!




## Step I walk throught

---

- date 18 Oct 2020
1.  edit prism.js prism-funky.css
2.  change link from member blade to file prism


---
-   date 12 Oct 2020
1.  update "Page" add,edit,delete to it


---

-   date 23 Sep 2020

1.  Added `body_import_js.blade.php` `head_import_css.blade.php`  to hopfully will group js file call in one place
for easy if later need to edit
2.  change theme prim from prism-dark to prim-cody.css will fixed the problem of edit with jodit editor great work Dude Vola!!


---
-   date 22 Sep 2020
1.  added Member\HomeController for member landing page
2.  Added favicon `<link rel='icon' href="{{asset('favicon')}}" type="image/x-icon" />` it's show error said "cannot show image as it is some error " so you have to give a permission to access to file `sudo chmod 777 -R XXX` (As XXX is your project folder path)so now you will get the web icon to show
3.  Added the hljs and prim for the beauty printing out source code on the webpage
checkout (prism):www.prismjs.com



---
- date 21 Sep 2020
1.  change table what_news added "is_public" field
to let user choose his post wheather to public or just keep it to himself.
2.  admin will landing on what_news page
3.  added helpers.php just to clean javascript from user






---



#   the step

>   create file "app/helpers.php" and put the code in it

```
<?php

function xxs_clean($tag){
    $bad = array("<script>","</script>");
    $replace = array("&lt;script&gt;","&lt;/script&gt;");

    return str_replace($bad,$replace,$tag);
}



?>

```


>  open file "composer.json" then add the code in the autoload section



```
"files":[
    "app/helpers.php"
]
```


>   your "autoload" should look like this

```

    "autoload": {
        "psr-4": {
            "App\\": "app/"
        },
        "classmap": [
            "database/seeds",
            "database/factories"
        ],

        "files" :[
            "app/helpers.php"
        ]
    },

```



>   now run `composer dump-autoload` and you're good to go


---

-   20 Sep 2020
1. update Pages and readme file




---
-   date 19 Sep 2020
1.  update my .vimrc and .tmux.conf





#   this is how my code look like

[pic_1]:https://i.pinimg.com/564x/c4/82/8c/c4828c282ecddc27d394d2b1ede67e45.jpg
![my sexy girl][pic_1]



#   Are you sexy?

>   sorry but I love sexy!
>   this is how my code look like a ha!


[sexy_girl]:https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ2v_MVwJg7QBbWU5BmZxaoxkjhgocizqczEA&usqp=CAU
![sexy girl][sexy_girl]



---

#   just a very small report NOT important at all



-   18 Sep 2020
1.  Added 'Public' page added 'PagesController' and the public request will go throught the PagesController
2.  add key on vim `nnoremap <leader>pp "+p` for copy a long text from anywhere! Vola!!



