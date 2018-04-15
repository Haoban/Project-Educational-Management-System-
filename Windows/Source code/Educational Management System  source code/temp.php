<script>
function datainsert(form){
    var xmlHttp;
    if(window.ActiveXObject){
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else if(window.XMLHttpRequest){
            xmlHttp = new XMLHttpRequest();
    }
    //表单传递的值
    var elective_id = form.elective_id.value;
    var elective_name = form.elective_name.value;
    var elective_location = form.elective_location.value;
    var elective_sums = form.elective_sums.value;
    var tea_id = form.tea_id.value;
    var credit = form.credit.value;
    var attribute = form.attribute.value;
    xmlHttp.open("GET","datainsert.php?elective_id="+elective_id+"&elective_name="+elective_name+"&elective_location="+elective_location+"&elective_sums="+elective_sums+"&tea_id="+tea_id+"&credit="+credit+"&attribute="+attribute,true);
    xmlHttp.onreadystatechange = function(){
    if(xmlHttp.readystate==4 && xmlHttp.status==200){
        var mes = xmlHttp.responseText;
        if(mes==1){
            alert("添加成功！");
            location.reload();
        }
        else{
            alert("添加失败！");
            return false;
        }
    }
    xmlHttp.send(null);
}
</script>