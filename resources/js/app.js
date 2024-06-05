import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

document.querySelectorAll('.form-delete').forEach(form => {
    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const modalEl = form.querySelector('.my-modal');
        const modalElRun = form.querySelector('.modal-run');
        const modalElStop = form.querySelector('.modal-stop');

        modalEl.classList.add('visible');
        
        modalElStop.addEventListener('click', function(){
            //console.log(modalEl);
            //modalEl.classList.remove('visible');
            
            console.dir(modalEl.outerHTML);
            modalEl.outerHTML = 
            `
            <div class="my-modal">
                <div class="modal-container">
                    <h5 class="text-center me-5">Delete this project?</h5>
                    <button class="btn btn-danger modal-run mx-5">Yes, Delete</button>
                    <button class="btn btn-success modal-stop">No, Comeback</button>
                </div>
            </div>
            `
        });
        
        modalElRun.addEventListener('click', function(){
            
            form.submit();
        });


    })
})
