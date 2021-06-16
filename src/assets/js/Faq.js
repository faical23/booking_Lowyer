const getBtnFaq = ()=>{
    let faqQuestion = document.querySelectorAll('.faq__content__faq_zone');
    var x = true
    faqQuestion.forEach( Element =>{
        Element.addEventListener('click' , ()=>{
            let Reponse = Element.querySelector('.faq__content__faq_reponse')
            let plus = Element.querySelector('.faq__content__faq_question_plus')

            if(x == true){
                Reponse.style='display:block;transition: 0.4s;';
                plus.innerHTML = "-"
                x = false
            }
            else if(x == false){
                Reponse.style="display:none;transition: 0.4s;";
                plus.innerHTML = "+"
                x = true
            }
        })
    })
}

function faqComponenet(data){ 
    document.querySelector('.faq__content__faq').innerHTML += /*html*/
                    ` 
                    <div class="faq__content__faq_zone" data-tagret="${data.question}">
                        <div class="faq__content__faq_question">
                            <h3 id="head">${data.question}</h3>
                            <h3 class="faq__content__faq_question_plus">+</h3>
                        </div>
                        <p class="faq__content__faq_reponse" id="faq_res">${data.reponse}</p>
                    </div>
                    `
    }
    
/// get json file faq

const getJsonFaq = (Value) =>{
    $.getJSON("assets/json/faq.json", function(json) {
        json.faq.map(i => {
            let number = i[Value].length;
            for (let j = 0; j <number ; j++){
                faqComponenet(i[Value][j]);
                getBtnFaq();
            }
        })
    });
}
getJsonFaq("general")




////// switch between quetsion faq
let all_btn_switch = document.querySelectorAll('.faq__content__btn button');
all_btn_switch.forEach(Element =>{
    Element.addEventListener('click' , () =>{
        document.querySelector('.active').classList.remove('active')
        Element.classList.add('active')
        document.querySelector('.faq__content__faq').innerHTML = ""
        let btnValue = Element.value;
        getJsonFaq(btnValue);
    })
})



