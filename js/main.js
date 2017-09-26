

var vm = new Vue({
    el: "#app",
    data: {
        keyword: '',
        jsons: '',
        returncode: 0,
        mainconshow: false,
        logominshow: false 
    },
    methods: {
        req: function() {

        },
        returnAni: function() {
            if(this.returncode == 1) {
                var _this = this;
                document.getElementById('keyword').blur();
                move(document.getElementById('main_logo_bk')).set('height','135px').duration('0.5s').end();
                this.logominshow = false;
                move(document.getElementById('main_logo_bk')).set('margin-top','11%').end();
                move(document.getElementById('main_con')).set('opacity',0).duration('0.5s').end(function() {
                    _this.mainconshow = false;
                    _this.returncode = 0;
                });
                this.keyword = '';
            }
        },
        intoAni: function() {
            if(this.returncode == 0) {
                var _this = this;
                move(document.getElementById('main_logo_bk')).set('height',0).duration('0.5s').end();
                move(document.getElementById('main_logo_bk')).set('margin-top',0).end(function () {
                    _this.logominshow = true;
                    _this.returncode = 1;
                });
                this.mainconshow = true;
                move(document.getElementById('main_con')).set('opacity',1).duration('0.5s').end();
                
            }
            
        }
    },
    watch: {
        keyword: function () {
            this.$http.get("php/websearch.php?keyword="+this.keyword).then(function (res) {
                this.jsons = res.body.data;
            })
        }
    }
});