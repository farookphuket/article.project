# article.project


> article.project is the laravel base using sqlite database.
> created on 16 Sep 2020

---
-   date 22 Sep 2020
1.  added Member\HomeController for member landing page
2.  Added favicon `<link rel='icon' href="{{asset('favicon')}}" type="image/x-icon" />` it's show error said "cannot show image as it is some error " so you have to give a permission to access to file `sudo chmod 777 -R XXX` (As XXX is your project folder path)so now you will get the web icon to show 

---
- date 21 Sep 2020
1.  change table what_news added "is_public" field 
to let user choose his post wheather to public or just keep it to himself.
2.  admin will landing on what_news page
3.  added helpers.php just to clean javascript from user 



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



