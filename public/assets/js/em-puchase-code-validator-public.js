new Vue({
    el: '#em-form',
    data: {
        purchaseCode: '',
        authToken: js_response.authToken,
        responseData: '',
        responseDataEnabler: false,
        responseMessage: '',
        responseMessageEnabler: false,
        responseMessageSuccess: false,
        responseMessageError: false,
        validMessage: '',
        validClass: false,
        invalidClass: false,
    },
    methods: {
        getValidity : function ( supportDate ) {
            let splitedDate = supportDate.split(' ');

            if ( splitedDate[0] == 'January' ) {
                splitedDate[0] = '01';
            } else if( splitedDate[0] == 'February' ) {
                splitedDate[0] = '02';
            } else if( splitedDate[0] == 'March' ) {
                splitedDate[0] = '03';
            } else if( splitedDate[0] == 'April' ) {
                splitedDate[0] = '04';
            } else if( splitedDate[0] == 'May' ) {
                splitedDate[0] = '05';
            } else if( splitedDate[0] == 'June' ) {
                splitedDate[0] = '06';
            } else if( splitedDate[0] == 'July' ) {
                splitedDate[0] = '07';
            } else if( splitedDate[0] == 'August' ) {
                splitedDate[0] = '08';
            } else if( splitedDate[0] == 'September' ) {
                splitedDate[0] = '09';
            } else if( splitedDate[0] == 'October' ) {
                splitedDate[0] = '10';
            } else if( splitedDate[0] == 'November' ) {
                splitedDate[0] = '11';
            } else if( splitedDate[0] == 'December' ) {
                splitedDate[0] = '12';
            }

            let formatedDate = splitedDate[2] + '-' +  splitedDate[0] + '-' + splitedDate[1].slice(0,-2);
            console.log( formatedDate );
            var date = moment(formatedDate);
            var now = moment();
            if ( now > date ) {
                this.validClass = false;
                this.invalidClass = true;
                return 'Invalid for support';
            } else {
                this.invalidClass = false;
                this.validClass = true;
                return 'Valid for support';
            }
        },
        getHumanDate : function ( date ) {
            humanData = moment(date).format('MMMM Do YYYY');
            return humanData;
        },
        emFormHandler: function() {
            if( this.authToken != null ) {
                const emInstance = axios.create({
                    baseURL: "https://api.envato.com/v1/market/private/user/verify-purchase:" + this.purchaseCode + ".json",
                    headers: {
                        'common': {
                            'Access-Control-Allow-Origin': "*",
                            "Authorization": 'Bearer ' + this.authToken,
                        }
                    }
                });
                
                const regex = /^(\w{8})-((\w{4})-){3}(\w{12})$/;
                if ( regex.test( this.purchaseCode) ){
                    emInstance.get().then( envatoResponse =>{
                        this.responseData = JSON.parse(envatoResponse.request.response);
                        if ( envatoResponse.request.response.length > 22 ) {
                            this.responseDataEnabler = true;
                            this.responseMessageEnabler = true;
                            this.responseMessageSuccess = true;
                            this.responseMessageError = false;
                            this.responseMessage = js_response.responseOne;
                        } else {
                            this.responseDataEnabler = false;
                            this.responseMessageEnabler = true;
                            this.responseMessageError = true;
                            this.responseMessageSuccess = false;
                            this.responseMessage = js_response.responseTwo;
                        } 
                    })
                } else {
                    this.responseMessageEnabler = true;
                    this.responseMessageError = true;
                    this.responseMessageSuccess = false;
                    this.responseMessage = js_response.responseThree;
                }
            } else {
                this.responseMessageEnabler = true;
                this.responseMessageError = true;
                this.responseMessageSuccess = false;
                this.responseMessage = js_response.responseFour;
            }
        },
    }
});