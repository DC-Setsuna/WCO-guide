<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>WCO</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    
    <script src="js/vue.js"></script>
    <script src="js/vue-resource.js"></script>
</head>
<body>
    
    <div id="main_logo" class="main_logo">
        <div class="main_logo_bk" id="main_logo_bk" ></div>
    </div>
    <div id="app">
        <div id="main_input" class="main_input">
            <div id="main_input_border" class="main_input_border">
        
                <input id="keyword" type="text" autocomplete="off" class="main_input_border_rect_input" v-model="keyword" @keyup.esc="returnAni" @focus="intoAni" spellcheck="false">
                <div>
                    <div id="logomin" v-show="logominshow"></div>
                </div>

            </div>
        </div>

        <div id="main_con" class="main_con" v-show="mainconshow">
            <div id="main_con_container" class="main_con_container">
                <ul class="conul">
                    <li v-for="json in jsons" class="conli">
                        <a  v-bind:href="json.webaddress" target="view_window" class="webResult_a">
                            <div class="logocon">
                                <img height="80" width="80" v-bind:src="'http://file.wcoguide.com/logoImg/'+json.imgpath">
                            </div> 
                        </a>
                        <div class="webResult_name" >{{json.webname}}</div>

                    </li>
                </ul>
            </div>
            

            <div id="return" @click="returnAni"></div>
        </div>
    </div>

    <div id="back"></div>
    

    
    <script src="js/move.min.js"></script>
    <script src="js/main.js"></script>
    
</body>
</html>
