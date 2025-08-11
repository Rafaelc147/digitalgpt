document.addEventListener('submit',function(e){
  if(e.target.matches('.add-to-cart')){
    e.preventDefault();
    fetch('/cart/add.php',{method:'POST',body:new FormData(e.target)})
      .then(r=>r.json()).then(()=>location.reload());
  }
  if(e.target.matches('.cart-update')){
    e.preventDefault();
    fetch('/cart/update.php',{method:'POST',body:new FormData(e.target)})
      .then(r=>r.json()).then(()=>location.reload());
  }
});
