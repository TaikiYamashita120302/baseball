const btn = document.getElementById('btn');
const txt = document.getElementById('txt');
btn.addEventListener('click', function(){
    const choice = window.confirm('CLICK COMPLETE');
    if(choice){
        txt.textContent = 'OKが選択されました';
    }else{
        txt.textContent = 'キャンセルが選択されました';
    }
})