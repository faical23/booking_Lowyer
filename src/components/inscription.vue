<template>
    <div class="Inscription">
        <h1>Inscription</h1>
        <form action="">
            <input type="text" placeholder="First Name" v-model="Fname">
            <input type="text" placeholder="Last Name"  v-model="Lname">
            <input type="text" placeholder="Email" v-model="Email">
             <input type="text" placeholder="Phone Number" v-model="PhoneNumber">
            <button  @click.prevent @click="get__data__inscription">Sign up</button>
            <p v-if="error_field">Error in some field</p>
        </form>
    </div>
</template>



<script>

export default {
    name:'Inscription',
    data (){
        return{
            api :"http://localhost/Lowyer__Booking/back_end/api/Api.php",
            Fname:"",
            Lname:"",
            Email:"",
            PhoneNumber:"",
            Age:"",
            error_field:false,
            exist_Email:false,

        }
    },
    methods:{
        get__data__inscription: function(){
            if(this.Fname == "" || this.Lname == "" || this.Email == "" || this.PhoneNumber== "" ){
                this.error_field=true
                console.log("some field is empty or has a error")
            }
            else{
                fetch("http://localhost/booking_Lowyer/back_end/api/Api.php" ,{
                    method:"POST",
                    headers: {
                        'Content-type': 'application/json'
                    },
                    body:JSON.stringify({
                        "Fname":this.Fname,
                        "Lname":this.Lname,
                        "PhoneNumber":this.PhoneNumber,
                        "Email":this.Email

                    })
                    }).then((response) => {return response.json()})
                    .then(
                        (res) => {
                            if(res.error === "Invalide Regix"){
                                this.error_field=true
                            }
                            else{
                                console.log(res)
                            }
                    }).catch((e) => console.log(e));
            }
        }
    }
}
</script>



















<style lang="scss">
.Inscription{
    text-align: center;
        input{
        display: block;
        margin: 20px auto;
    }
    button{
        font-size: 16px;
        transition: 0.3s ease-in-out;
        font-weight: 300;
        border-radius: 30px;
        padding: 10px 25px;
        cursor: pointer;
        background-color: black;
        color: white;
        &:hover {
        background-color: white;
        color: black;
        border: 1px solid black;
        }
    }
}

</style>