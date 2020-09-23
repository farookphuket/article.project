<!-- 
    DO NOT import JQUERY! it is oready in the <head> import ! 
    
        - need html syntax <script src="{{asset("path/to/js-file")}}"
-->




<!-- prism -->
<script type="text/javascript" src="{{asset("prism/prism.js")}}"></script>




<!-- hljs -->

<script type="text/javascript" src="{{asset("hlls/hljs.js")}}"></script>

<script type="text/javascript" src="{{asset("hlls/hljs-line-numbers.js")}}"></script>

<!--
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/highlightjs-line-numbers.js@2.6.0/dist/highlightjs-line-numbers.min.js"></script>
-->
<script type="text/javascript">
        hljs.initHighlightingOnLoad();
        hljs.initLineNumbersOnLoad();
</script>





<!-- jodit -->
<script type="text/javascript" src="{{asset("jodit3/jquery3.js")}}"></script>
<script type="text/javascript" src="{{asset("jodit3/jodit.js")}}"></script>
<script type="text/javascript" src="{{asset("jodit3/main.js")}}"></script>


