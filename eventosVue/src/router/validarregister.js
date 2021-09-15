let validar = new Vue ({
    el: '#app',
    data: {
        errors: [],
        nombre: null,
        apellido: null,
        telefono: null,
        email: null,
        submitted: false,
        expression: /\w+@\w+\.+[a-z]/,
        meansTransport: [
            {text:'Juan', value: 1},
            {text:'Perez',value:1},
            {text:'0987136547', value:10},
            {text:'ejemplo@hotmail.com', value: 22},
        ]
    },
    computed: {
        hasErrors: function(){
            return !!this.errors.length;
        },
        inputVisible() {
            return this.choice == 3;
        }
    },
    methods: {
        checkForm: function(e) {
            this.errors = [];
            this.submitted = true;

            if (this.nombre && this.apellido && this.telefono && this.email && this.validateChoice() && this.expression.test(this.email)){
                 return true;                
            }
            
            if (!this.nombre) this.errors.push('Nombre requerido');
            if (!this.apellido) this.errors.push('Apellido requerido');
            if (!this.telefono) this.errors.push('Email requerido');
            if (!this.expresion.test(this.email)) this.errors.push('Formato de email incorrecto')
        },
        validateChoice: function() {
            if (this.choice == -1 || (this.choice == 3 && !this.nombre )) {
                return false;
            }else return true;

        }
    }  
});
