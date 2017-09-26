

var returncode = 0;

document.getElementById('keyword').onfocus = function() {
    if(returncode == 0) {
        move(document.getElementById('main_logo_bk')).set('height',0).duration('0.5s').end();
        move(document.getElementById('main_logo_bk')).set('margin-top',0).end(function () {
            document.getElementById('logomin').style.display = 'block';
        });
        document.getElementById('main_con').style.display = 'block';
        move(document.getElementById('main_con')).set('opacity',1).duration('0.5s').end();
    }
    returncode = 1;
}

document.getElementById('return').onclick = function() {
	move(document.getElementById('main_logo_bk')).set('height','135px').duration('0.5s').end();
	document.getElementById('logomin').style.display = 'none';
    move(document.getElementById('main_logo_bk')).set('margin-top','11%').end();
    move(document.getElementById('main_con')).set('opacity',0).duration('0.5s').end(function() {
    	document.getElementById('main_con').style.display = 'none';
    });
    //document.getElementById('keyword').value = '';
    window.vm.keyword = '';
    returncode = 0;
}
