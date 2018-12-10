<?php
/**
 * Created by John Richard Quitaneg.
 * User: JOQUITAN
 * Email: johnrichardq@gmail.com
 * Date: 12/07/2018
 * Time: 6:32 PM
 */
 ?>
<script type="text/javascript">
        $(document).ready(function(){

            loadMsg();
            hideLoading();

            $("form#chatform").submit(function(){

                $.post('<?=base_url()?>/chat/update',{
                    message: $("#content").val(),
                    name: $("#chatname").val(),
                    action: "postmsg"
                }, function() {

                    $("#messagewindow").prepend("<b>"+$("#chatname").val()+"</b>: "+$("#content").val()+"<br />");

                    $("#content").val("");
                    $("#content").focus();
                });
                return false;
            });
        });

        function showLoading(){
            $("#contentLoading").show();
            $("#txt").hide();
            $("#author").hide();
        }
        function hideLoading(){
            $("#contentLoading").hide();
            $("#txt").show();
            $("#author").show();
        }

        function addMessages(xml) {
            $("#messagewindow").empty();
            $(xml).find('message').each(function() {

                author = $(this).find("author").text();
                msg = $(this).find("text").text();

                $("#messagewindow").append("<b>"+author+"</b>: "+msg+"<br />");
            });

        }

        function loadMsg() {
            $.get('<?=base_url()?>/chat/backend', function(xml) {
                $("#loading").remove();
                addMessages(xml);
            });

            setTimeout('loadMsg()', 1000);
        }
    </script>
    <style type="text/css">
        #messagewindow {
            height: 250px;
            border: 1px solid;
            padding: 5px;
            overflow: auto;
        }
        #wrapper {
            margin: auto;
            width: 438px;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <p id="messagewindow"><span id="loading">Loading...</span></p>
    <form id="chatform">
        <div id="author">
            <input type="hidden" id="chatname" name="chatname" value="<?=$this->input->cookie('username')?>"/>
        </div><br />

        <div id="txt">
            Message: <input type="text" class="form-control" name="content" id="content" value="" />
        </div>

<!--        <div id="contentLoading" class="contentLoading">-->
<!--            <img src="--><?//=base_url()?><!--/images/blueloading.gif" alt="Loading data, please wait...">-->
<!--        </div><br />-->

<!--        <input type="submit" value="ok" /><br />-->
    </form>
</div>
