const selected= document.querySelector(".selected-type");
const optionsContainer=document.querySelector(".type-options");

const optionsList= document.querySelectorAll(".type-options .option");

selected.addEventListener("click", () => {
    optionsContainer.classList.toggle("active");

})

optionsList.forEach(o => {
    o.addEventListener("click", ()=> {
        selected.innerHTML = o.querySelector("label").innerHTML;
        optionsContainer.classList.remove("active"); 
    })
})

const selected1= document.querySelector(".selected-criterion1");
const optionsContainer1=document.querySelector(".criterion1-options");
const optionsList1=document.querySelectorAll(".criterion1-options .option");

selected1.addEventListener("click", () => {
    optionsContainer1.classList.toggle("active");

})

optionsList1.forEach(o => {
    o.addEventListener("click", ()=> {
        selected1.innerHTML = o.querySelector("label").innerHTML;
        optionsContainer1.classList.remove("active"); 
    })
})



const selected2= document.querySelector(".selected-criterion2");
const optionsContainer2=document.querySelector(".criterion2-options");
const optionsList2=document.querySelectorAll(".criterion2-options .option");

selected2.addEventListener("click", () => {
    optionsContainer2.classList.toggle("active");

})

optionsList2.forEach(o => {
    o.addEventListener("click", ()=> {
        selected2.innerHTML = o.querySelector("label").innerHTML;
        optionsContainer2.classList.remove("active"); 
    })
})