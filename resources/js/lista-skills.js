jQuery(function () {
    const selectedSkills = new Set();

    (function renderAllSkills() {
        const skills = JSON.parse($("[data-skills]").attr("data-skills"));
        let append="";
        skills.forEach(skill => append += `
            <li
                data-skill="skill"
                class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4"
            >${skill}</li>
        `)
        const render = `
            <ul class="flex flex-wrap justify-center">
                ${append}
            </ul>
            <input type="hidden" name="skills" id="skills">
        `
        // console.log(render);
        $("[data-skills]")[0].innerHTML = render
    }());
    (function renderOldSkills() {
        let oldSkills = JSON.parse($("[data-old-skills]").attr("data-old-skills"));// null object or string value
        // console.log(typeof oldSkills, oldSkills);
        if (oldSkills) { // string value
            oldSkills = oldSkills.split(",").forEach(oldSkill => {
                selectedSkills.add(oldSkill);
            }) // array

            $('#skills').val([...selectedSkills]) // convert Set to Array ; agregar las habilidades seleccionadas al input hidden
            $("[data-skill]").each(function (i, el) { // todos los lis
                if (selectedSkills.has(el.textContent)) {
                   $(el).attr("class", clasesCSS(el.textContent)); // estilos css
                }
            })
        }
    })();
    function clasesCSS(skill) {
        const defaultCSS = "border border-gray-500 px-10 py-3 mb-3 rounded mr-4 "
        const dynamicCSS = selectedSkills.has(skill) ? 'bg-teal-400' : '';
        return defaultCSS + dynamicCSS;
    }

    $("[data-skills]").on("click", toggleSkill); // event delegation
    function toggleSkill(e) {
        if (e.target.getAttribute("data-skill")) { // li
            // console.log(e.target.textContent)
            if (e.target.classList.contains('bg-teal-400')) {// el skill esta en activo
                e.target.classList.remove('bg-teal-400');
                selectedSkills.delete(e.target.textContent);// Eliminar del set de habilidades
            } else {// No esta activo, añadirlo
                e.target.classList.add('bg-teal-400');
                selectedSkills.add(e.target.textContent);// Agregar al set de habilidades
            }

            $('#skills').val([...selectedSkills]); // convert Set to Array ; agregar las habilidades seleccionadas al input hidden
            $(e.target).attr("class", clasesCSS(e.target.textContent)); // estilos css
        }
    }
})
