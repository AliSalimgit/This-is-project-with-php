function gethtml(result){
  let x=``;
  x=x+`<div class="addnew"><button id="btnaddnew" class="btn btn-primary">add new</button></div>`;
   x=x+`<table class="table table-striped">`;
  let i=0;
  for(i=0;i<result.length;i++){
    if(i==0){
x=x+`<thead>
<th>serel</th>
<th>code</th>
<th>title</th>
<th>debertment</th>
<th>n-of-mos</th>
<th>link</th>
<th>tg-le</th>
<th></th>

</thead><tbody>

`;
    }
    x=x+`
    <tr>
    <td>${i+1}</td>
    <td>${result[i]['pcode']}</td>
    <td>${result[i]['ptitle']}</td>
    <td>${result[i]['dtitle']}</td>
    <td>${result[i]['nos']}</td>
    <td>${result[i]['gl']}</td>
    <td>${result[i]['tl']}</td>
    <td><button class="btn btn-primary btnedit"
     data-details='${JSON.stringify(result[i])}'
    
    

    
    >edit</button></td>

    </tr>
   `;
  }
x=x+`</tbody></table>`;
return x;
}
function getsbox(result){
  let x=``;
  x=x+`<option value= -1}>select one</option>`
  let i=0
  for(i=0;i<result.length;i++){
    x=x+`<option value= ${result[i].did}>
    ${result[i].dtitle}
    </option>`;
  }
  return x;
}
function getprogrammedtils(){
  $.ajax({
    url: "/sms/ajax/getprogremdatilsAJAX.php",
    type: "POST",
    datatype: "JSON",
    data: {a: "33", b: "ff", action1: "getprogrammedtils"},
    beforeSend: function(){
        // alert("about to make AJAX");
    },
    success: function(result){
        let x = JSON.stringify(result);
        let html = gethtml(result);
        $("#contentdiv").html(html);
    },
    error: function(){
        alert("OK error");
    }
  
  });
}
function loadd(){
$.ajax({
  url: "/sms/ajax/getprogremdatilsAJAX.php",
  type: "POST",
  datatype: "JSON",
  data: {action1: "getd"},
  beforeSend: function(){
      // alert("about to make AJAX");
  },
  success: function(result){
      let x = JSON.stringify(result);
      // alert(x);
      // let html=getsbox(result);
      // $("#dd").html(html);

  },
  error: function(){
      alert("OK error");
  }


});

}
function pushtos(txtcode,txttitle,txtnos,dd,ddtg,ddtl){
$.ajax({
  url: "/sms/ajax/getprogremdatilsAJAX.php",
  type: "POST",
  datatype: "JSON",
  data: {txtcode:txtcode,txttitle:txttitle,txtnos:txtnos,dd:dd,ddtg:ddtg,ddtl:ddtl, action1: "saveprograme"},
  beforeSend: function(){
      // alert("about to make AJAX");
  },
  success: function(result){
      let x = JSON.stringify(result);
      if(x=="0"){
alert("not insert");
}else{
  alert("insert");
  window.location.reload(true);

      }
      // let html = gethtml(result);
      // $("#contentdiv").html(html);
  },
  error:function(){
      alert("OK error");
  }

});
}
function update(pid,txtcode,txttitle,txtnos,dd,ddtg,ddtl,){
alert(pid);
$.ajax({
  url: "/sms/ajax/getprogremdatilsAJAX.php",
  type: "POST",
  datatype: "JSON",
  data: {pid:pid,txtcode:txtcode,txttitle:txttitle,txtnos:txtnos,dd:dd,ddtg:ddtg,ddtl:ddtl, action1: "update"},
  beforeSend: function(){
      // alert("about to make AJAX");
  },
  success: function(result){
      let x = JSON.stringify(result);
      if(x=="0"){
alert("not insert");
}else{
  alert("insert");
  window.location.reload(true);

      }
      // let html = gethtml(result);
      // $("#contentdiv").html(html);
  },
  error:function(){
      alert("OK error");
  }

});
}
$(document).ready(
  function(){
    getprogrammedtils();
    loadd();
    $(document).on("click","#btnaddnew",function(){
$("#promodal").modal();
$("#flage").val("new");
    });
   $(document).on("click","#btnsave",function(){
    let txtcode=$("#txtcode").val();
    let txttitle=$("#txttitle").val();
    let txtnos=$("#txtnos").val();
    let dd=$("#dd").val();
    let ddtg=$("#ddtg").val();
    let ddtl=$("#ddtl").val();
    let pid=$("#pid").val();

    if(txtcode!=''&& txtnos!=''&& dd>=0){
      if($("#flage").val()=="new"){
        pushtos(txtcode,txttitle,txtnos,dd,ddtg,ddtl);
  
      }else{
        update(pid,txtcode,txttitle,txtnos,dd,ddtg,ddtl);
      }
   pushtos(txtcode,txttitle,txtnos,dd,ddtg,ddtl);
    }
    else{
      alert("not vald");
    }
   });
$(document).on("keypress","#txtnos",function(e){
  // alert(e.keycode);
  if(!(e.keycode>=48 && e.keycode<=57)){
    e.preventDefault();
  }
  else{
  }
});
$(document).on("click",".btnedit",function(){
  $("#flage").val("new");
  $("#promodal").modal();
  let details=$(this).data("details");
$("#txtcode").val(details["pcode"]);
$("#txttitle").val(details["ptitle"]);
$("#txtnos").val(details["nos"]);
$("#ddtg").val(details["gl"]);
$("#ddtl").val(details["tl"]);
$("#pid").val(details["pid"]);


});

  }
);