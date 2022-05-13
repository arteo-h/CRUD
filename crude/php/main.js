$(".btnedit").click(e=>{
    let textvalues = displayData(e);
    let web =$("input[name*='web']");
    let finance =$("input[name*='finance']");
    let newtwork =$("input[name*='network']");
    let internship =$("input[name*='intern']");

    web.val(textvalues[0]);
    finance.val(textvalues[1]);
    network.val(textvalues[2]);
    intern.val(textvalues[3].replace("$",""));

});
function displayData(e){
    let id=0;
    const td=$("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if (value.dataset.id == e.target.dataset.id){
            textvalues[id++]=value.textContent;
        }
    }
    return textvalues;
}