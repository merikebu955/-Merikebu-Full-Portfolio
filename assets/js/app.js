(() => {
 const body=document.body, toggle=document.getElementById('themeToggle');
 const saved=localStorage.getItem('portfolio-theme'); if(saved==='light')body.classList.add('light-mode');
 if(toggle)toggle.addEventListener('click',()=>{body.classList.toggle('light-mode');localStorage.setItem('portfolio-theme',body.classList.contains('light-mode')?'light':'dark');});
 const el=document.querySelector('.typed'); if(el){const words=(el.dataset.words||'web applications').split(',');let wi=0,ci=0,del=false;function type(){const word=words[wi];el.textContent=word.slice(0,ci);if(!del&&ci<word.length){ci++;setTimeout(type,85);}else if(!del){del=true;setTimeout(type,1300);}else if(ci>0){ci--;setTimeout(type,38);}else{del=false;wi=(wi+1)%words.length;setTimeout(type,250);}}type();}
 document.querySelectorAll('a[href^="#"]').forEach(a=>a.addEventListener('click',e=>{const target=document.querySelector(a.getAttribute('href'));if(target){e.preventDefault();target.scrollIntoView({behavior:'smooth'});}}));
})();