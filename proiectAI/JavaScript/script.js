'use stric'
// selectem un element din javascript

if(document.readyState=='loading'){
    document.addEventListener('DOMContentLoaded',ready)
}else{
    ready();
}



function ready(){
    var removeCartItemButtons=document.getElementsByClassName('remove-btn');
    for(var i=0;i<removeCartItemButtons.length;++i){
        var button=removeCartItemButtons[i];
        button.addEventListener('click',removeCartItem);
    }

    var cantitateInputs=document.getElementsByClassName('cantitate-btn');
    for(var i=0;i<cantitateInputs.length;++i){
        var inputCart=cantitateInputs[i];
        inputCart.addEventListener('click',AddSub);
       
    }

    var addToCartButtons=document.getElementsByClassName('btn-cart');
    for(var i=0;i<addToCartButtons.length;++i){
        var buttonC=addToCartButtons[i];
        buttonC.addEventListener('click',addToCart)
    }
}

function addToCart(event){
    var buttonClicked=event.target
    var item=buttonClicked.parentElement.parentElement;
    var title=item.getElementsByClassName('image__title')[0].innerText
    var price=item.getElementsByClassName('price')[0].innerText.split('lei')[0]
    var cantitate=parseInt(item.getElementsByClassName('cantitate-text')[0].value)
    item.getElementsByClassName('cantitate-text')[0].value=0;
    console.log(title,price,cantitate)
    if(cantitate>0)
        addItemToCart(title,cantitate,price)


}

function addItemToCart(title,cantitate,price){
    //creeaza o linie in cart row 
    //createElement ne permite sa creem orice fel de obiect vrem
    var cartRow=document.createElement('div')
    cartRow.classList.add('rand') //asta adauga la clasa rand elementul abia creat
  
    var cartItem=document.getElementsByClassName('rand')[0]     //reprezinta lista si unde trebuie sa adaugam
    var cartItemsName=document.getElementsByClassName('car-name-row'); //luam numele tuturor celor din lista

    for(var i=0;i<cartItemsName.length;++i){ //trecem prin toate si daca unul are acelasi acelasi nume inseamna ca acesta mai doreste introdus element si facem o reactualizare
        if(cartItemsName[i].innerText==title){
            var priceUpdate=parseInt(cartItemsName[i].parentElement.getElementsByClassName('totalp')[0].innerText.split('lei')[0])/parseInt(cartItemsName[i].parentElement.getElementsByClassName('cantitate-text')[0].value)
            console.log(priceUpdate)
            var cantitateUpdate=parseInt(cartItemsName[i].parentElement.getElementsByClassName('cantitate-text')[0].value)+cantitate;
            priceUpdate=priceUpdate*cantitateUpdate;
            cartItemsName[i].parentElement.getElementsByClassName('input__t')[0].value=cantitateUpdate
            cartItemsName[i].parentElement.getElementsByClassName('totalp')[0].innerText=priceUpdate+'lei/'+cantitateUpdate
            return;
         
        }
    }
    var carRowContContens=`
    <div class="element">
    <a class="car-name-row" href="#">${title}</a>
     <div class="input_box">
         <input class="input__b remove-btn" type="button"  value="X" >
         <input class="input__b cantitate-btn" type="button" value="-">
         <input class="input__t cantitate-text" type="text"   value="${cantitate}">
        <input class="input__b cantitate-btn" type="button" value="+">
     </div>
    <div class="totalp">${cantitate*price} lei/${cantitate}</div>                  
    </div>
    `//formatul folosit asemeni celor lalte
    cartRow.innerHTML=carRowContContens;//adaugam formatul
    cartItem.appendChild(cartRow) //adaugam la sfarsit
    cartRow.getElementsByClassName('remove-btn')[0].addEventListener('click',removeCartItem);
    var z=cartRow.getElementsByClassName('cantitate-btn')
    for(var i=0;i<z.length;++i){
        var inputCart=z[i];
        inputCart.addEventListener('click',updatePrice); 
    }
}

function removeCartItem(event){
    var buttonClicked=event.target
    buttonClicked.parentElement.parentElement.remove();
}

function updatePrice(event){
    var buttonClicked=event.target;
    var valueText=parseInt(buttonClicked.parentElement.querySelector('.cantitate-text').value);
    var priceTotal=parseInt(buttonClicked.parentElement.parentElement.getElementsByClassName('totalp')[0].innerText.split('lei')[0])
     var priceValue=priceTotal/valueText
     
    console.log(priceValue)
     switch(buttonClicked.value){
         case "-":   
             if(valueText>0)
                 valueText-=1
                 priceTotal-=priceValue
             break;
         case "+":
                 valueText+=1
                 priceTotal+=priceValue
             break;
         default:
             break;
     }
     var priceText=`${priceTotal} lei/${valueText}`
     buttonClicked.parentElement.parentElement.getElementsByClassName('totalp')[0].innerText=priceText
     buttonClicked.parentElement.querySelector('.cantitate-text').value=valueText; 
}

function AddSub(event){
   var buttonClicked=event.target;
   var valueText=parseInt(buttonClicked.parentElement.querySelector('.cantitate-text').value);
    switch(buttonClicked.value){
        case "-":   
            if(valueText>0)
                valueText-=1
                
            break;
        case "+":
                valueText+=1
               
            break;
        default:
            break;
    }
    var valueText=buttonClicked.parentElement.querySelector('.cantitate-text').value=valueText; 
}

let mPaginaCurenta=1;
let nrElements=6;


var containerWithItems=document.getElementsByClassName("grid-item");
var containerALL=document.getElementsByClassName("container")[0];
var list_pagination=document.getElementsByClassName('paginare-lista');

var vectorNrList=[];
for(var i=0;i<list_pagination.length;++i){
    var nrPagina=list_pagination[i].getElementsByTagName('a')[0].text
    vectorNrList.push(vectorNrList)
 
}


var grid_item=[];
for(var i=0;i<containerWithItems.length;i++)
    grid_item.push(containerWithItems[i])



function displayElements(items,wrapper,nrPage,page){
    wrapper.innerHTML="";
    page--;
    //calculam mereu punctul de plecare pentru fiecare pagin in parte
    var loop_start=nrPage*page
    var vector=items.slice(loop_start,loop_start+nrPage)
    // console.log(loop_start,vector.length);
  
    for(var i=loop_start;i<(loop_start+vector.length);i++){
     
     
        var  item_element= document.createElement('div'); 
         item_element.classList.add('item');
        var item_Container=items[i]
        item_element.appendChild(item_Container);
        wrapper.appendChild(item_element)
    }
  
}
function SetupPagination(items,wrapper,nrPage){
     wrapper[0].innerHTML=""
    //determinam cate li pagini sa fie afisate
     var page_count=Math.ceil(items.length/nrPage)   
     for(var i=1;i<page_count+1;++i){
        var li= buttoanePaginare(i,items);
        wrapper[0].appendChild(li)
     }
}
function buttoanePaginare(page,items){
    var buttonLI=document.createElement('li')
    buttonLI.classList.add('p-number')
  
    var contentPagina=
    `
        <a href="#" >${page}</a>
    `
    
    buttonLI.innerHTML=contentPagina;
   
    if(page==mPaginaCurenta) buttonLI.classList.add('active')

    buttonLI.addEventListener('click',function(){
        mPaginaCurenta=page;
        displayElements(items,containerALL,nrElements,mPaginaCurenta);
        
        //stergem activul
        var currentLi=document.querySelector('li.p-number.active');
        console.log(currentLi)
        currentLi.classList.remove('active');

        this.classList.add('active')

    })

    return buttonLI;
}


displayElements(grid_item,containerALL,nrElements,mPaginaCurenta);
SetupPagination(grid_item,list_pagination,nrElements);