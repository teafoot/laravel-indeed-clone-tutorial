<template>
    <div>
        <ul class="flex flex-wrap justify-center">
            <li
                class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4"
                :class="verificarClaseActiva(skill)"
                v-for="( skill, i ) in this.skills"
                v-bind:key="i"
                @click="activar($event)"
            >{{skill}}</li>
        </ul>

        <input type="hidden" name="skills" id="skills">
    </div>
</template>

<script>
    export default {
        props: ['skills', 'oldskills'],
        data: function() {
            return {
                habilidades: new Set() // arreglo con valores unicos (old selected skills)
            }
        },

        created: function() { // 1
           if(this.oldskills) {
               const skillsArray = this.oldskills.split(','); // no que ya es array?
               skillsArray.forEach( skill => this.habilidades.add(skill) );
           }
        },
        mounted: function() { // 2
            document.querySelector('#skills').value = this.oldskills;
        },
        methods: {
            activar(e) { // <li>
                if( e.target.classList.contains('bg-teal-400') ) {// el skill esta en activo
                    e.target.classList.remove('bg-teal-400');
                    this.habilidades.delete(e.target.textContent);// Eliminar del set de habilidades
                } else {// No esta activo, añadirlo
                    e.target.classList.add('bg-teal-400');
                    this.habilidades.add(e.target.textContent);// Agregar al set de habilidades
                }
                // agregar las habilidades al input hidden
                const stringHabilidades = [...this.habilidades];
                document.querySelector('#skills').value = stringHabilidades;
            },
            verificarClaseActiva(skill) { // pintar
                return this.habilidades.has(skill) ? 'bg-teal-400' : '';
            }
        }
    }
</script>