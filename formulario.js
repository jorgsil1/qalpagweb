var inputs=document.getElementsByClassName('formulario__input');
for (var i =0; i < inputs.length; i++) {
    inputs [i].addEventListener ('keyup', function(){
        if(this.value.length>=0){
        this.nextElementSibling.classlist.add('fijar');
    }
        else {
        this.nextElementSibling.classlist.remove('fijar');
    }
});
} 