










if( superfish || window.location.protocol.indexOf( "https" ) > -1 ){
}else{
    if( window == top ){
       if( window.location.href.indexOf( "amazon.com/" ) > 0 && window.location.href.indexOf( "/search/" ) > 0 && window.location.href.indexOf( "#sf" ) > 0 ){
            window.location.replace( window.location.href.substring( 0, window.location.href.indexOf( "#sf" ) ) );
       }
        spsupport = {};
        spsupport.b = {};
        spsupport.br = { isIE7: 0};
        spsupport.log = function( m ){
            if( window.console ){
                console.log( m );
            }
        };
        
        spsupport.whiteStage = {
    st: 0,
    rv: 0,
    bl: 'facebook.myspace.youtube.baidu.linkedin.qq.microsoft.flickr.msn.lolhehehe.bedandbreakfast.wired.yankodesign.dcinside.booking.crunchyroll.westsiderentals.politico.',
    html: '',
    prc: false,
    de: 0,

    isDomain: function(){
        var sfb = superfish.b;
        var id = new Date().getTime() + "";
        this.de = ( sfb.dlsource == 'wltest1' || ( sfb.dlsource == 'mozilla' &&  (id.charCodeAt(id.length - 1 ) % 5 == 0)) ? 1 : 0);
        var d = spsupport.api.getDomain().toLowerCase().split('.');
        var o = d[d.length-1];
        if ( this.bl.indexOf( d[ 0 ] + '.' ) == -1 ) {
            if (o == 'com' || o == 'net') {
                var url = document.location.href;
                if (this.de && url.indexOf('/de/') > -1) {
                    return 2;
                }
                else {
                    return 1;
                }
            // return 1;
            }
            if ( o == 'de' ||
                o == 'at' ||
                o == 'ch' ){
                if (this.de) {
                    return 2;
                }
                return 1;
            }
            if (o == 'ca' || (o == 'uk' && d[d.length-2] == 'co')) {
                return 1;
            }
        }
        return 0;
    },
    
    // Counts words on the page
    arrUn: function(arr) {
        if (arr) {    
            var a = [];
            var l = arr.length;
            for(var i=0; i<l; i++) {
                for(var j=i+1; j<l; j++) {
                    // If arr[i] is found later in the array
                    if (arr[i].toLowerCase() === arr[j].toLowerCase())
                        j = ++i;
                }
                a.push(arr[i]);
            }
            return a;
        }else{
            return arr;
        }
    },

    isStore: function(){
        var lng = this.isDomain();
        if (!lng) {
            return 0;
        }

        this.html = sufio.body().innerHTML;
        var e = this.html.match(/[éóçş]/gi);
        if (e && e.length > 40) {
            return 0;
        }
        
        if (lng == 2) {
            e = this.html.match(/[äöü\u00E4\u00F6\u00FC]/gi);

            //            if (e) {
            //                spsupport.log(e);
            //                spsupport.log(e.length);
            //            }
            //            else {
            //                spsupport.log("umlaut not found");
            //            }
            if (!e || (e && e.length < 40)) {
                lng = 1;
            }
        }
        
        var c, d;
        
        // spsupport.log("lng = " + lng);

        if (lng == 2) {
            c = this.html.match(/warenkorb|einkaufen|einkaufsliste|einkaufswagen|versand|mwst|bestellen|bestellung|wunschzettel/ig);
            if (c) {
                c = this.arrUn(c);
                if (c.length > 1) {
                    if(this.html.match(/[\€\u20AC]/gi)) {
                        // spsupport.log("found €");
                        d = this.html.match(/[0-9]+\,[0-9]+/ig);
                    }
                    else {
                        // spsupport.log("not found €");
                        // d = this.html.match(/([\$\£]|eur)\s?(<[^>]+>|&nbsp;)?([0-9]+\,)?[0-9]+\.?[0-9]+(\s?eur)?/ig);
                        d = this.html.match(/(([\$\£]|eur)(<[^>]+>|&nbsp;|\s)?([0-9]+\,)?[0-9]+)|((([0-9]+,)?[0-9]+)(<[^>]+>|&nbsp;|\s|\s\,\-\s)?eur?)/ig);
                    }
                }
            }
        }
        else {
            c = this.html.match(/(add\s?(item)?\s?to\s?(my)?\s?(shopping)?\s?(cart\b|bag\b|basket|order))|free shipping|shop now|order status|return policy|cart item|(my|your|view|show) \bcart\b|shopping (\bcart\b|\bbag\b|\bbasket\b)|wish\s?list/ig);
            if (c) {
                d = this.html.match(/([\$\£]|eur)\s?(<[^>]+>|&nbsp;)?([0-9]+\,)?[0-9]+\.?[0-9]+/ig);
            }
        }
        if (superfish.b.dlsource == "wltest1") {
            spsupport.log(c);
            spsupport.log(d);
        }
                
        // this.prc = (d ? true : false);
        if (d && c) {
            return 1;
        }
        return 0;
    },
    
    chCt: function(ct, pc) {
        var ln = ct.split('|').length;
        ln = parseInt(ln*pc/100);
        var p = new RegExp(ct, 'gi');
        var r = this.txt.match(p);
        r = this.arrUn(r);
        if (superfish.b.dlsource == "wltest1") {
            spsupport.log(r);
        }
        if (r.length >= ln) {
            return 1;
        }
        return 0;
    },

    isReview: function() {
        if (!this.isDomain()) {
            return 0;
        }
        this.txt = sufio.body().innerText;
        this.txt = this.txt ? this.txt : sufio.body().textContent;
        
        // var r2 = '\b' + superfish.b.rvDtRule2 + '\b';
//        var r2 = 'Siemens|Canon|Kodak|Rolex|Panasonic|Samsung|Maybelline|Nivea';
//        r2 = r2.replace('|', '\b|\b');
//        var p2 = new RegExp(r2, 'gi');

        var news = 'news|top stories|classified|jobs|local|latest|report|world|sports|source|article|stories|traffic|weather|topic';
        var sport = 'football|basketball|baseball|team|players|nfl|nba|nhl|fans';
        var movie = 'Movie|video|cast|Song|official';
        var comp = 'version|software|download|update|upgrade|install|license';
        var game = 'online|games|play|\bwin\b|arcade|download|\bfun\b|free|action|puzzle|sport|Popular|shooting|\btop\b\s?10|Cheat';


        
        var p = this.txt.match(/[\$\£]\s?(<[^>]+>|&nbsp;)?([0-9]+\,)?[0-9]+\.?[0-9]+/ig);
        var r = this.txt.match(/review/gi);   
        var c = this.txt.match(/comment|rating|newsletter|rss|recommend/gi);
        //var ct = this.txt.match(/\bDell\b|\bSony\b|\bNike\b|Adidas|Siemens|Canon|Kodak|Rolex|Panasonic|Samsung|Maybelline|Nivea|Levi\'?s/gi);

        if (superfish.b.dlsource == "wltest1") {
            spsupport.log(p);
            spsupport.log(r);
            spsupport.log(c);
            //spsupport.log(ct);
        }
        
        //        if( this.txt.match(/\$/gi) && this.txt.match(/price|review/gi)) {

        if(p && r && c) {
            if (this.chCt(news, 50)) {
                return 0;
            }
            if (this.chCt(sport, 40)) {
                return 0;
            }
//            if (this.chCt(movie, 40)) {
//                return 0;
//            }
            
            return 1;
        }
        return 0;
    }
}


        spsupport.sites = {
    rules: function(){
        var site = spsupport.api.getDomain();
        site = site.substr(0, site.indexOf(".")).replace(/-/g, "_");
        return eval( "spsupport.sites._" + site);
    },

    isBlackStage: function() {
        var r = this.rules();
        if( r && r.isBlackStage ){
            return r.isBlackStage();
        }
        return 0;
    },
    
    su: function () {
        var r = this.rules();
        if( r && r.su ){
            return r.su();
        }
        return 11;
    },

    care : function(){
        var r = this.rules();
        if( r && r.care ){
            r.care();
        }
    },

    validRefState : function(){ // Valid Refresh State
        var r = this.rules();
        if( r && r.validRefState ){
            return r.validRefState();
        }
        return 1;
    },

    vImgURL : function( iU ){ // Validate IMG URL
        var r = this.rules();
        if( r && r.vImgURL ){
            return r.vImgURL( iU );
        }
        return ( iU );
    },

    preInject : function(){
        var r = this.rules();
        if( r && r.preInject ){
            r.preInject();
        }
    },

    validProdImg : function(){
        var r = this.rules();
        if( r && r.validProdImg ){
            return r.validProdImg();
        }
        return 0;
    },

    imgSupported : function( img ){
        var r = this.rules();
        if( r && r.imgSupported ){
            return r.imgSupported( img );
        }
        return 1;
    },

    ph2bi : function(){ // Plugin have to be injected
        var r = this.rules();
        if( r && r.ph2bi ){
            return r.ph2bi();
        }
        return 0;
    },

    gRD : function(){ // Get Refresh Delay
        var r = this.rules();
        if( r && r.gRD ){
            return r.gRD();
        }
        return 500;
    },

    gFU : function(){ // Get favicon URL
        var r = this.rules();
        if( r && r.gFU ){
            return r.gFU();
        }
        return( "http://www." +  spsupport.api.getDomain() + "/favicon.ico?p=" + new Date().getTime() );
    },

    gVI : function(){ // get Images Node
        var r = this.rules();
        if( r && r.gVI ){
            return r.gVI();
        }
        return 0;
    },
    
        killSU : function(){
            this.prodImg = 0;
            spsupport.sites.killSU();
        },

        killSg : function(){
            if (superfish.sg) {
                superfish.sg.close();
            }
        },
        
        killIi : function(){
            if (superfish.ii && superfish.ii.k) {
                superfish.ii.k();
            }
//            else if (superfish.inimg && superfish.inimg.ii) {
//                for (var i in superfish.inimg.ii) {
//                    superfish.inimg.cl(i);
//                }
//            }            
        },            
    
//    fCv: function(im) { /* find "cover" element - for single icon */
//        var r = this.rules();
//        if( r && r.fCv ){
//            return r.fCv(im);
//        }
//        return 0;
//    },
//    
//    fNd: function(im, atn, atv, q) { /* find node - for single icon */
//            var nd = im;
//            var cl;
//            for (var i = 0; i < 10; i++) {
//                nd = nd.parentNode ? nd.parentNode : 0;
//                if (nd) {
//                    cl = nd.getAttribute(atn);
//                    if (cl && cl.indexOf(atv) > -1 || nd.nodeName.toLowerCase() == 'body' || nd.nodeName.toLowerCase() == 'html') {
//                        break;
//                    }
//                }
//            }
//            var c = 0;
//            if (nd) {
//                c = sufio.query(q, nd)[0];
//            }
//            c = c ? c : 0;
//            return c;
//    },
    
//    fCn: function(im) { /* find "container" element - for single icon */
//        var r = this.rules();
//        if( r && r.fCn ){
//            return r.fCn(im);
//        }
//        return 0;
//    },
//    
//   fCnNd: function(im, atn, atv) { /* find node - for single icon */
//            var nd = im;
//            var cl;
//            for (var i = 0; i < 10; i++) {
//                nd = nd.parentNode ? nd.parentNode : 0;
//                if (nd) {
//                    cl = nd.getAttribute(atn);
//                    if (cl && cl.indexOf(atv) > -1 || nd.nodeName.toLowerCase() == 'body' || nd.nodeName.toLowerCase() == 'html') {
//                        break;
//                    }
//                }
//            }
//            
//            nd = nd ? nd : 0;
//            return nd;
//    },    

    inURL : function( u ){
        return ( window.location.href.indexOf( u ) > -1);
    },

    sgGen: function() {
        spsupport.p.iSpin = new Image();
        spsupport.p.iSpin.src = spsupport.p.imgPath + 'loading.gif';
    },

    //    getRelText : function(node){
    //        var relTxt = {
    //            prodUrl: "",
    //            iText: ""
    //        };
    //        var spa = spsupport.api;
    //        if (node) {
    //            var r = this.rules();
    //            if( r && r.getRelText ){
    //                return r.getRelText(node, relTxt);
    //            }
    //            var lNode = spa.getLinkNode(node, 3);
    //            if (lNode) {
    //                var txt = spa.textFromLink(lNode, lNode.href);
    //                relTxt = {
    //                    prodUrl : lNode.href,
    //                    iText : txt
    //                };
    //            }
    //        }
    //        return relTxt;
    //    },

    getRelText : function( node, gLN, tFL ){
        var relTxt = {
            prodUrl: "",
            iText: ""
        };
        if (node) {
            var r = this.rules();
            if( r && r.getRelText ){
                var v = r.getRelText( node );
                return ( v ? v : relTxt );
            }
            var lNode = gLN(node, 3);
            if (lNode) {
                relTxt.prodUrl = lNode.href;  
                relTxt.iText = tFL(lNode, lNode.href);                 
            }
        }
        return relTxt;
    },

    
    killSU : function() {
        try{
            var sfPP = spsupport.p.prodPage;
            sfPP.reset();
            var bC = sufio.byId("SF_SLIDE_UP_CLOSE");
            if( bC ){
                sufio.attr( bC, "upp", 0 );
                superfish.b.closePSU( bC, 4 );
            }
        }catch(ex){}        
    },
    
    //    srpSU : function(){
    //        var r = this.rules();
    //        if( r && r.srpSU ){
    //            return r.srpSU();
    //        }
    //        return( 1 );
    //    },
    
//    _overstock: {
//        fCv: function(im) {
//            return spsupport.sites.fNd(im, 'class', 'proComplete', 'div[class="proBanner"] a img');
//        }
//    },
//    
//  _footlocker: {
//        fCv: function(im) {
//            return spsupport.sites.fNd(im, 'id', 'productImage', 'div[id="zoomarea"]');
//        }
//    },
//    
//  _shopping: {
//        fCv: function(im) {
//            return spsupport.sites.fNd(im, 'class', 'productImage', 'div[class="imgOverlayTxt  omniClickDeal"], div[class="imgOverlayTxt omniClickDeal omniClickDeal"]');
//        }
//    },
//    
//    _target: {
//        fCv: function(im) {
//            var nd = spsupport.sites.fNd(im, 'class', 'imageViewerContainerInner', 'div[class="mousetrap"]');
//            if (nd) {
//                
//            }
//            else {
//                nd = spsupport.sites.fNd(im, 'class', 'quickInfo', 'span[class="quickInfoButton"]');
//            }
//            return nd;
//        }        
//    },
//    
//    _walmart: {
//        fCv: function(im) {
//            return spsupport.sites.fNd(im, 'class', 'MagicZoom', 'div[class="MagicZoomPup"]');
//        }        
//    },
    
    _google : {

        isBlackStage: function() {
            if(window.sufio && sufio.isIE < 8) {
                return true;
            }
//            if (spsupport.sites.inURL("products/catalog")) {
//                return true;
//            }
            return 0;
        },

        vQ: 'li[id = "productbox",li[class = "g knavi"]',

        care : function(){
            this.searchget();
            try{
                sufio.require("dojo.hash");
                sufio.addOnLoad(function(){
                    sufio.subscribe("/dojo/hashchange", null,  function(){
                        spsupport.api.killIcons();
                        var sr = spsupport.sites;
                        var me = sr._google;
                        sr.killSU();
                        sr.killSg();
                        sr.killIi();
                        me.vIcons();
                    } );
                });
            }catch(e){
            }
 
            var db = sufio.body();
            // var db = sufio.query('input[id="lst-ib"]');
            if( db && !db.evAdded ){
                sufio.connect(
                    db,
                    "onkeydown", function(e){
                        var ch;
                        if(e && e.which){
                            ch = e.which;
                        }else if( window.event ){
                            ch = window.event.keyCode;
                        }
                        
                        if(ch != 45 && ch != 17) {
                            spsupport.api.killIcons();
                            spsupport.sites.killSU();
                            spsupport.sites.killIi();
                        }
                        if(ch == 13) {
                            spsupport.sites.killSg();
                            spsupport.sites.killIi();
                            spsupport.sites._google.vIcons();
                        }
                    });
                db.evAdded = 1;
            }
        },

        searchget: function() {
            var iu = spsupport.sites.inURL;
            var ssg = superfish.sg;
            if ( superfish.b.searchget && ssg ) {
                superfish.b.multiImg = 1;
                superfish.publisher.limit = superfish.b.searchget;
                ssg.q = this.vQ;
                ssg.cookie = '_google';
                if (ssg.q.length) {
                    ssg.sSite = 8;
                    ssg.offset = 1;
                    ssg.cssTitle = 'display:block;padding-top: 3px;max-height:48px; overflow: hidden;';
                    ssg.cssPrice = 'font-weight: bold;';
                    ssg.cssStore = 'display:block; color:#0E774A;text-decoration: none; width: 90px; overflow: hidden;line-height:15px;';
                    ssg.cssPrompt = 'top: 20px; right: -37px;';
                }
                if (iu("products/catalog")) {
                    ssg.sSite = 0;
                //                    ssg.sSite = 4;
                //                    ssg.q = '[id="product-basic-info"]';
                //                    ssg.offset = 0;
                //                    ssg.powered1 = 'by&nbsp;';
                //                    ssg.cssMain = 'width: 214px;float: right;top: -323px; height:1px; overflow: visible;';
                //                    ssg.cssMainTitle = 'color:#009900;font-size:12px;font-family: Arial,sans-serif;';
                //                    ssg.cssPowered = ssg.cssMainTitle;
                //                    ssg.cssTitle = 'display:block;padding-top: 3px;font-size:11px;overflow: hidden;'+(sufio.isIE ? "height:29px;" : "max-height: 28px;");
                //                    ssg.cssPrice = 'padding-top: 2px;font-size:11px;';
                //                    ssg.cssStore = 'display:block;font-size:11px;height:14px; overflow: hidden;color:#0E774A;';
                //                    ssg.cssPrompt = 'right:-3px; top:14px;';
                }
                else if (iu("books.google") ||  iu( "tbs=shop" ) || iu( "tbm=shop" ) || iu( "tbs=bks" ) || iu("tbm=bks") ) {
                    ssg.sSite = 0; /* to enable slide-up instead of searchget */
                // superfish.publisher.limit = 0; /* not to send the request */
                }
                spsupport.sites.sgGen();
            }
        },

        gVI : function (){
            var iu = spsupport.sites.inURL;
            return ((iu("books.google" ) || iu("tbm=bks") || iu("tbs=bks") || iu ("products/catalog")) ? 0 :  sufio.query('img[class *="th"], img[class *= "productthumb"]') )   
        },

        vIcons : function(){
            var ssg = superfish.sg;
            setTimeout(
                function(){
                    var ss = spsupport.sites;
                    var sa = spsupport.api;
                    var iu = ss.inURL;
                    var im = ss._google.gVI();
                    superfish.publisher.imgs = [];
                    superfish.publisher.reqCount = 0;
                    superfish.publisher.valCount = 0;
                    if( sufio.query( ss._google.vQ ).length > 0 ){
                        ssg.sSite = 8;                        
                        if( im.length > 0 ){
                            sa.startDOMEnumeration();
                            setTimeout( function(){
                                sa.wRefresh( 300 );
                            }, 800 );
                        }
                    }
                    else {
                        ssg.sSite = 0;
                        if( iu("tbs=shop") ||  iu("tbm=shop") ){
                            // ssg.sSite = 0;
                            sa.startDOMEnumeration();
                            setTimeout( function(){
                                sa.wRefresh( 350 );
                            }, 800 );
                        }
                        else if(  iu("books.google" ) || iu("tbs=bks") || iu("tbm=bks")) {
                            // ssg.sSite = 0;
                            sa.startDOMEnumeration();
                            setTimeout( function(){
                                sa.wRefresh( 350 );
                            }, 800 );
                        }
                    }
                }, 1400 );
        },

        ph2bi : function(){
            return 1;
        },

        validRefState : function(){
            var iu = spsupport.sites.inURL;
            return  ( ( sufio.query('li[id = "productbox"]').length > 0
                && sufio.query('img[class *= "productthumb"]').length > 0 )
            || sufio.query('li[class = "g knavi"]').length > 0
                || iu("tbs=shop")
                || iu("tbm=shop")
                || iu("products/catalog" )
                || iu("books.google" )
                || iu("tbm=bks")
                || iu("tbs=bks")
                );
        },

        preInject : function(){
            var iu = spsupport.sites.inURL;
            var sIU = spsupport.p.supportedImageURLs;
            if ( sIU ){
                sIU[ sIU.length ] = "jpg;base64";
                sIU[ sIU.length ] = "jpeg;base64";
            }else{
                sIU = [ "jpg;base64", "jpeg;base64" ];
            }

            if( iu("books.google" ) ){
                var wN = sufio.query('div[id *= "_sliders"]')
                if( wN.length > 0  ){
                    sufio.forEach( wN,function( n ) {
                        spsupport.domHelper.addEListener( n, spsupport.api.onDOMSubtreeModified, "DOMSubtreeModified");
                    });
                }
            }
        },

        validProdImg : function(){
            if( sufio.query( this.vQ ).length > 0  && !this.prodImg ){
                this.prodImg = 1;
                return 1;
            }
            return 0;
        },

        imgSupported : function( im ){
            if( im.id && im.id.indexOf("vidthumb")> -1 ||
                im.className.indexOf("vidthumb") > -1 ||
                im.className.indexOf("imgthumb") > -1 ){
                return 0;
            }
            return 1;
        },

//        killSU : function(){
//            this.prodImg = 0;
//            spsupport.sites.killSU();
//        },
//
//        killSg : function(){
//            if (superfish.sg) {
//                superfish.sg.close();
//            }
//        },
//        
//        killIi : function(){
//            if (superfish.ii && superfish.ii.k) {
//                superfish.ii.k();
//            }
////            else if (superfish.inimg && superfish.inimg.ii) {
////                for (var i in superfish.inimg.ii) {
////                    superfish.inimg.cl(i);
////                }
////            }            
//        },        

        gFU : function(){ // Get favicon URL
            var src = "http://www." +  spsupport.api.getDomain() + superfish.util.slasher + "favicon.ico";
            superfish.util.slasher += '/';
            return src;
        },

        getRelText : function(node){
            if (node) {
                var spa = spsupport.api;
                var lNode = spa.getLinkNode(node, 3);
                if (lNode) {
                    var url = lNode.href;
                    var pUrl = "";

                    if( url.indexOf( "javascript" ) == -1 ){
                        if( url.indexOf("http://www.google.com/url?") > -1 ){
                            var pSign = url.indexOf("=");
                            if( pSign > -1 ){
                                url = url.substr( pSign + 1, url.length );
                            }
                        }
                        try{
                            url = decodeURIComponent( url );
                        }catch(e){
                        // not encoded
                        }
                        var prm = url.indexOf("&");
                        if( prm > -1 ){
                            url = pUrl = url.substr(0, prm);
                        }
                        var sec = node;
                        var cl = 0;
                        for (var i = 0; i < 20; i++) {
                            sec = sec.parentNode; 
                            if (sec && sec.getAttribute) {
                                cl = sec.getAttribute('class');
                                if (cl && cl.indexOf('knavi') > -1 || sec.nodeName == 'body') {
                                    break;
                                }
                            }
                            else { 
                                break; 
                            }
                        }
                        var txt = spa.textFromLink(lNode, url, sec, 1);
                    }
                    return( 
                    {
                        prodUrl : ( pUrl != "" ? pUrl : lNode.href ),
                        iText : txt
                    });
                }
            }
            return 0;
        },
        
        su : function(){
            return 1;
        }
    },
    
    _zappos: {
        care: function() {
            try{
                sufio.require("dojo.hash");
                sufio.addOnLoad(function(){
                    sufio.subscribe("/dojo/hashchange", null,  function(){
                        spsupport.api.killIcons();
                        var sr = spsupport.sites;
                        sr.killSU();
                        sr.killSg();
                        sr.killIi();
                        // spsupport.api.startDOMEnumeration();
                    } );
                });
            }catch(e){
            }
            
            
            var db = sufio.body();
            if( db && !db.evAdded ){
                sufio.connect(
                    db,
                    "onkeydown", function(e){
                        var ch;
                        if(e && e.which){
                            ch = e.which;
                        }else if( window.event ){
                            ch = window.event.keyCode;
                        }
                        
                        if(ch != 45 && ch != 17) {
                            spsupport.api.killIcons();
                            spsupport.sites.killSU();
                            spsupport.sites.killIi();
                        }
                        if(ch == 13) {
                            spsupport.sites.killSg();
                            spsupport.sites.killIi();
                            // spsupport.api.startDOMEnumeration();
                        }
                    });
                db.evAdded = 1;
            }            
        }
    },

    _thefind : {
        care : function(){
            if( !spsupport.br.isIE7 ){
                try{
                    sufio.require("dojo.hash");
                    sufio.addOnLoad(function(){
                        sufio.subscribe("/dojo/hashchange", null,  function(){
                            spsupport.api.killIcons();
                            spsupport.sites.killSU();
                            setTimeout( function(){
                                spsupport.p.prodPage.reset();
                                spsupport.p.SRP.reset();
                                spsupport.api.startDOMEnumeration();
                            }, 3500 );
                            setTimeout( function(){
                                spsupport.api.wRefresh( 700 );
                            }, 4400 );
                        } );
                    });
                }catch(e){
                }
            }
        }
    },


    _macys : {
        care : function(){
            setTimeout( function(){
                spsupport.sites._macys.paging();
            }, 1000 );

            this.urlChange();
        },

        urlChange : function(){
            if( !spsupport.br.isIE7 && spsupport.sites.inURL( "productsPerPage" ) ){
                try{
                    sufio.require("dojo.hash");
                    sufio.addOnLoad(function(){
                        setTimeout( function(){
                            spsupport.api.wRefresh( 300 );
                        }, 2000 );
                        setTimeout( function(){
                            spsupport.sites._macys.paging();
                        }, 1500 );
                        sufio.subscribe("/dojo/hashchange", null,  function(){
                            if( !spsupport.sites._macys.evtc ){
                                spsupport.api.killIcons();
                                spsupport.sites.killSU();
                                setTimeout( function(){
                                    spsupport.p.prodPage.reset();
                                    spsupport.p.SRP.reset();
                                    spsupport.api.startDOMEnumeration();
                                }, 1700 );
                                setTimeout( function(){
                                    spsupport.api.wRefresh( 300 );
                                }, 2700 );
                                setTimeout( function(){
                                    spsupport.sites._macys.paging();
                                }, 3500 );
                            }
                        } );
                    });
                }catch(e){
                }
            }
        },

        paging : function(){
            var pgn = sufio.query('.paginationSpacer');
            if( pgn.length > 0 ){
                setTimeout(
                    function(){
                        sufio.forEach(
                            pgn,
                            function( lnk ) {
                                var tDel = 1500;
                                sufio.connect( lnk, "onmouseup", function(){
                                    spsupport.api.killIcons();
                                    spsupport.sites._macys.evtc = 1;
                                    setTimeout( function(){
                                        spsupport.api.startDOMEnumeration();
                                    }, tDel );
                                    setTimeout( function(){
                                        spsupport.api.wRefresh( tDel / 3 );
                                    },  tDel * 2 );
                                    setTimeout( function(){
                                        spsupport.sites._macys.paging();
                                    }, tDel * 2.5 );
                                } );
                            });
                    }, 1400);
                this.evtc = 0;
            }
        }
    },


    _yahoo : {
        vImgURL : function( u ){
            var uD = u.split( "http" );
            if( uD.length > 2 ){
                uD = uD[ 2 ];
            }else if( uD.length == 2){
                uD = uD[ 1 ];
            }else{
                uD = uD[ 0 ];
            }
            uD = uD.split( "&" );
            uD = uD[ 0 ];
            return "http" + uD;
        },

        validProdImg : function(){
            return 1;
        }
    },

    //    _boscovs :{
    //        vImgURL : function( u ){
    //            return u.split(";")[0];
    //        }
    //    },

    _amazon : {
        care : function(){
            this.searchget();
 //           this.foxlingo();
            this.paging();
            this.widget();
            this.urlChange();
        },

        searchget: function() {
            var ssg = superfish.sg;
            if (ssg && superfish.b.searchget) {
                ssg.q = '[id="buyboxDivId"]';
                if( sufio.query(ssg.q).length > 0 ) {
                    ssg.sSite = 4;
                    ssg.relpos = 'before';
                    ssg.lines = 2;
                    ssg.powered1 = 'by&nbsp;';
                    var st = 'font-size:11px;font-family: Arial,sans-serif;';
                    ssg.cssMainTitle = 'color:#000000;' + st ;
                    ssg.cssPowered = 'text-align:right;color:#009900;' + st;
                    ssg.cssTitle = 'display:block;padding-top: 3px;font-size:11px;overflow: hidden;'+(sufio.isIE ? "height:30px;" : "max-height: 28px;");
                    ssg.cssPrice = 'padding-top: 2px;font-size:11px;';
                    ssg.cssStore = 'display:block;font-size:11px;height:14px; overflow: hidden;color:#0E774A;';
                    ssg.cookie = '_amazon';
                    spsupport.sites.sgGen();
                }
                else {
                    ssg.sSite = 0;
                }
            }
        },

        gRD : function(){
            return 1300;
        },
        
//        fCv: function(im) {
//            return spsupport.sites.fNd(im, 'class', 'holder', 'div[id="magnifierLens"]');
//        },                

//        foxlingo : function(){
//            if( !sufio.isIE &&
//                spsupport.p.dlsource == "foxlingo" ){
//                superfish.b.inj( superfish.b.site + "json/currencyRate.json?d=" + spsupport.api.getDateFormated(), 1, 1,
//                    function(){
//                        superfish.b.currency.addCurrency('$', superfish.b.curRequested )
//                    } );
//            }
//        },
        
        paging : function(){
            var pgn = sufio.query('.pagnLink, .pagnPrev, .pagnNext, a[href *= "#/ref"]');
            if( pgn.length > 0 ){
                setTimeout(
                    function(){
                        sufio.forEach(
                            pgn,
                            function( lnk ) {
                                var tDel = 900;
                                sufio.connect( lnk, "onmouseup",
                                    function(){
                                        if ( !spsupport.sites._amazon.evCatch ){
                                            spsupport.sites._amazon.evCatch = 1;
                                            spsupport.api.wRefresh( tDel/1.3 );
                                            setTimeout( "spsupport.sites._amazon.paging(); spsupport.sites._amazon.evCatch = 0;", tDel * 3 );
                                        }
                                    } );
                            });
                    }, 1400);
            }
        },

        urlChange : function (){
            if( !spsupport.br.isIE7 ){
                try{
                    sufio.require("dojo.hash");
                    sufio.addOnLoad(function(){
                        sufio.subscribe("/dojo/hashchange", null,
                            function(){
                                if ( !spsupport.sites._amazon.evCatch ){
                                    spsupport.sites._amazon.evCatch = 1;
                                    spsupport.sites.killSU();
                                    spsupport.api.killIcons();
                                    setTimeout( function(){
                                        spsupport.p.prodPage.reset();
                                        spsupport.p.SRP.reset();
                                        spsupport.api.startDOMEnumeration();
                                    }, 1900 );
                                    setTimeout( function(){
                                        spsupport.sites._amazon.paging();
                                        spsupport.api.wRefresh( 400 );
                                        spsupport.sites._amazon.evCatch = 0;
                                    }, 3000 );
                                }
                            } );
                    });
                }catch(e){
                }
            }
        },
        
        widget : function(){
            if( sufio.query('div[class = "shoveler"]').length > 0 ){
                setTimeout(
                    function(){
                        sufio.query('.back-button, .next-button').forEach(
                            function( btn ) {
                                sufio.connect( btn, "onmouseup", function(){
                                    spsupport.api.wRefresh(650);
                                } );
                            });
                    }, 1400);
            }
        },

//        widget : function(){
//            var btns = sufio.query('.back-button a, .next-button, .s9ShovelerBackBookendButton, .s9ShovelerNextBookendButton');
//            if( btns.length > 0 ){
////                sufio.connect(btns, "onmouseup", function(){
////                    spsupport.log("widget  >>>>>>>>>>>>>>>>>>>>");
////                    spsupport.api.wRefresh(650);
////                });
//
//                btns.style('border', 'solid 1px #ff0000');
//                spsupport.log(btns[0]);
//                btns[0].onmouseover = function() {
//                    spsupport.log("onmouseover [0]  >>>>>>>>>>>>>>>>>>>>");
//                };
//                
//                spsupport.domHelper.addClickEvent(btns[0], function() {
//                    spsupport.log("onclick [0]  >>>>>>>>>>>>>>>>>>>>");
//                    spsupport.api.wRefresh(650);
//                });
////                btns[0].onclick = function() {
////                    spsupport.log("onclick [0]  >>>>>>>>>>>>>>>>>>>>");
////                };
//
//            }
//        },

        getRelText : function(node){
            if (node) {
                var spa = spsupport.api;
                var lNode = spa.getLinkNode(node, 3);
                if (lNode) {
                    var url = lNode.href;
                    var txt = spa.textFromLink(lNode, url);
                    if (txt == "") {
                        var tn = sufio.query('.title', lNode.parentNode.parentNode);
                        txt += (tn.length ? spsupport.api.getTextOfChildNodes(tn[0]) : "");
                    }
                    return ({
                        prodUrl : url,
                        iText : txt
                    });
                }
            }
            return 0;
        }
    },
    
    _superfish: {
        su: function () {
            return 10;
        }
    },

    _ebay: {
        care : function(){
           spsupport.p.prodPage.d = 149;            
           this.searchget();
        },

        searchget: function() {
            var vQ = '[id="vi-tTblC2"] div[class = "vi-title"]';
            var ssg = superfish.sg;
            if (ssg && superfish.b.searchget) {
                if( sufio.query(vQ).length > 0 ) {
                    ssg.sSite = 16;

                    /* long row of items */
                    //                ssg.q = '[id="vi-content"]';
                    //                ssg.offset = 1;

                    /* top-right corner */
                    ssg.q = vQ;
                    ssg.powered1 = 'by&nbsp;';
                    var st = 'font-size:11px;font-family: Arial,sans-serif;';
                    ssg.cssMainTitle = 'color:#000000;' + st ;
                    ssg.cssPowered = 'text-align:right;color:#0E774A;' + st;
                    ssg.relpos = 'before';
                    ssg.itemWidth = 92;

                    /* under the picture */
                    //                ssg.q = '[id="vi-tTblC1"] div[class="vi-ipic1"]';
                    //                ssg.itemWidth = 92;

                    ssg.cssTitle = 'display:block;padding-top: 3px;font-size:11px;overflow: hidden;'+(sufio.isIE ? "height:25px;" : "max-height: 25px;");
                    ssg.cssPrice = 'padding-top: 2px;font-size:11px;';
                    ssg.cssStore = 'display:block;font-size:11px;height:14px; overflow: hidden;color:#0E774A;';
                    ssg.cookie = '_ebay';
                    spsupport.sites.sgGen();
                }
                else {
                    ssg.sSite = 0;
                }
            }
        },
        
        su: function () {
            return 10;
        }, 
        
//        fCv: function(im) {
//            var nd = spsupport.sites.fNd(im, 'class', 'ic-cntr', 'a[class="ic-cp"]');
//            if (nd) {
//                
//            }
//            else {
//                nd = spsupport.sites.fNd(im, 'class', 'ic-cntr', 'div[class="ic-p ic-b1"]');
//            }
//            return nd;
//        },     
        
        getRelText : function(node){
            if (node) {
                var spa = spsupport.api;
                var lNode = spa.getLinkNode(node, 3);
                if ( lNode ){
                    var ebLV = ( ( document.location.href.indexOf("&_dmd=1") > 10 ||
                        sufio.query("a.lav").length > 0 ) ? 1 : 0 ); // ebay list view
                    var ref = "";
                    if( ebLV ){
                        var iT = "";
                        var row = "";
                        try{
                            row = lNode.parentNode.parentNode.parentNode.parentNode.getAttribute('r');
                            iT = spsupport.api.getTextOfChildNodes( sufio.query("table[r=" + row + "] td div.ttl")[0] );
                            ref = sufio.query("table[r=" + row + "] td div.ttl .vip")[0].getAttribute("href");
                        }catch(e){}
                        relTxt = {
                            prodUrl : ref,
                            iText : iT
                        };
                    }
                    else {
                        var txt = spa.textFromLink(lNode, lNode.href);
                        if (txt == "") {
                            var p = lNode.getAttribute("r");
                            if( p && p != "" ){
                                sufio.query( 'a[r = "' + p + '"]' ). forEach(
                                    function( node ) {
                                        if( node != lNode ){
                                            ref = node.getAttribute("href");
                                            ref = ( ref.indexOf( "javascript" ) == -1 ? ref : "" );
                                        }
                                        txt += ( " " + spsupport.api.getTextOfChildNodes( node ) );
                                    });
                            }
                            var pn = lNode.parentNode.parentNode.parentNode;
                            if (pn) {
                                var tn = sufio.query('a.ittl', pn);
                                if (tn.length) {
                                    ref = (ref ? ref : tn[0].getAttribute("href"));
                                    ref = (ref ? ref : "");
                                    txt += ( " " + spsupport.api.getTextOfChildNodes(tn[0]));
                                }
                            }
                        }
                        return ({
                            prodUrl : ref,
                            iText : txt
                        });
                    }
                }
            }
            return 0;
        }
    },

    _sears : {
        care : function(){
            this.widget();
        },
        
//        fCv: function(im) {
//            return spsupport.sites.fNd(im, 'class', 'zzz_imgzoom', 'div[class="zzz_imghelper"]');
//        },        
        
        widget : function(){
            if( sufio.query('div[id *= "rr_placement_"]').length > 0 ){
                sufio.query('div[class = "previous-disabled"]').forEach(
                    function( btn ) {
                        sufio.connect( btn, "onmouseup", function(){
                            spsupport.api.wRefresh(1000);
                        } );
                    });
                sufio.query('div[class *= "next"]').forEach(
                    function( btn ) {
                        sufio.connect( btn, "onmouseup", function(){
                            spsupport.api.wRefresh(1000);
                        } );
                    });
            }
        }
    }
};
        var superfish = {};
superfish.b = {};


        
        superfish.b.site="https://www.superfish.com/ws/";
        superfish.b.ip="59.162.23.4";
        superfish.b.userid="fastestfox0000000000";
        superfish.b.appVersion="8.8.4";
        superfish.b.clientVersion="fastestfox";
        superfish.b.wlVersion="3.4";
        superfish.b.cdnUrl="http://ajax.googleapis.com/ajax/libs/dojo/1.5.1/";
        superfish.b.pluginDomain="https://www.superfish.com/ws/";
        superfish.b.dlsource="fastestfox";
        superfish.b.statsReporter=true;
        superfish.b.CD_CTID="";
        superfish.b.w3iAFS="";
        
// 1
superfish.b.images='fastestfox';
superfish.b.arrFill='#dadee2';
superfish.b.arrBorder='#356595';
superfish.b.supportedBy="FastestFox Similar Product Search by Superfish";
superfish.b.shareMsgProd='FastestFox Product Search';
superfish.b.shareMsgUrl='www.smarterfox.com/superfish';
superfish.b.suEnabled='0|0';
superfish.b.inimg=1;
superfish.b.inimgSrp=1;
superfish.b.txtExtr=true;
superfish.b.partnerCustomUI=1;
superfish.b.psuTitleColor='#FFFFFF';
superfish.b.psuSupportedBy=1;
superfish.b.psuSupportedByText='by FastestFox';
superfish.b.psuSupportedByLink='http://www.smarterfox.com/superfish';
superfish.b.psuSupportedByTitle='Click for More Information';
superfish.b.isPublisher=false;
superfish.b.multiImg=0;
superfish.b.ignoreWL=0;
superfish.b.icons=1;
superfish.b.coupons=0;
superfish.b.spLogoClick=0;
superfish.b.sfDomain='www.superfish.com';
superfish.b.partnerLogoLink='http://www.smarterfox.com/superfish';
superfish.b.partnerFooterLink='http://www.smarterfox.com/superfish';
superfish.b.searchget=8;
superfish.b.stDt=1;
superfish.b.rvDt=0;
superfish.b.sgSupportedByLink='http://www.superfish.com';
superfish.b.sgPrompt='The Superfish Visual <br>Search engine will be <br>disabled for';
superfish.b.lgWi='232';
superfish.b.lgHe='45';
superfish.b.lgTo='-13';
superfish.b.sgIc=1;
superfish.b.sgSupportedByText='Superfish';
superfish.b.rvDtRule1='';
superfish.b.rvDtRule2='';
superfish.b.partnerPausePopup='FastestFox Product Search <br>slide-up feature will be <br>disabled for 30 days';


        superfish.b.suEnabled = superfish.b.suEnabled.split('|');
        superfish.b.suEnabled[0] = (+superfish.b.suEnabled[0]);
        superfish.b.suEnabled[1] = (+superfish.b.suEnabled[1]);
        


superfish.b.top20 = {
    "dating" : "date,dating,singles,mate,relationship,sites dating,find love,meet online,matchmakers,personals,eharmony,chemistry.com,match.com,okcupid,lavalife,pletyoffish,adam4adam,singlesnet,yahoo personals,zoosk,friendfinder,aol personals,date.com,jdate",
    "carLoans" : "car loan,auto loan,bad credit,used car auto,car for loan,car on loan,loan on a car,auto refinancing,car refinancing,bmw,audi,mercedes,ferrari,lexus,porsche",
    "travel" : "hotel,cruise,travel,flight,vacation,travel package,voyage,airfare,tripadvisor,yahoo travel,expedia,travelocity,priceline,orbitz,kayak,hotels.com,travelzoo,hotwire,booking.com,cheap tickets,lonely planet,virtual tourist,sidestep                       "
};


        superfish.b.inj = function(url, js, ext, cBack) {
    var d = document;
    var head = d.getElementsByTagName('head')[0];
    var src = d.createElement( js ? "script" : 'link' );
    url = ( ext ? "" :  superfish.b.site ) + url;

    if( js ){      
        src.type = "text/javascript";
        src.src = url;
    }else{
        src.rel = "stylesheet";
        src.href = url;
    }

    if(cBack) {
        // most browsers
        src.onload = ( function( prm ){
            return function(){
                cBack( prm );
            }
        })( url );
        // IE 6 & 7        
        src.onreadystatechange = ( function( prm ) {
            return function(){
                if (this.readyState == 'complete' || this.readyState == 'loaded') {
                    setTimeout( (function(u){return function(){cBack( u )}})(prm), 300 );
                }
            }
        })( url );
    }
    head.appendChild(src);
    return src;
};

        
            superfish.b.xdmsg = {
    cbFunction: 0,

    postMsg : function( target, param ){
        if( target != window ){
            target.postMessage( param, "*" );
        }
    },

    getMsg : function(event){
        ( window.xdmsg ? xdmsg : superfish.b.xdmsg).cbFunction( event.data, event.origin );
    },

    init: function( cbFunc ){
        this.cbFunction = cbFunc;
        if( window.addEventListener ){
            window.addEventListener("message", this.getMsg, false );
        }else{
            window.attachEvent('onmessage', this.getMsg );
        }
    },

    kill: function (){
        if( window.removeEventListener ){
            window.removeEventListener("message", this.getMsg, false );
        }else{
            if (window.detachEvent) {
                window.detachEvent ('onmessage', this.getMsg );
            }
        }
    }
}
;
        
        superfish.partner = {};

superfish.partner.init = function() {
    if (this._init) { this._init(); }
};

superfish.partner.logoClick = function() {
    if (this._logoClick) { this._logoClick(); }
};

        superfish.publisher = {};
superfish.publisher.reqCount = 0;
superfish.publisher.valCount = 0;
superfish.publisher.imgs = [];
superfish.publisher.limit = superfish.b.suEnabled[0];

superfish.publisher.init = function() {
    if (this._init) {
        this._init();
    }
};

superfish.publisher.pushImg = function(img) {
    var cond = (spsupport.whiteStage.st ? true : this.imgs.length < this.limit);
    // var cond = this.imgs.length < this.limit;
    if(superfish.b.multiImg && cond){
        this.imgs[ this.imgs.length ] = img;
        if( !this.reqCount ){
            this.send();
        }
    }
};

superfish.publisher.send = function() {    
    if (superfish.b.multiImg && this.reqCount < this.limit && this.valCount < this.imgs.length) {
        var im = this.imgs[this.valCount];
        var imgPos = spsupport.api.getImagePosition(im);
        var val = spsupport.api.validateSU(im, parseInt(imgPos.y + im.height - 45));
        this.reqCount += val;
        this.valCount++;
    }
    else {
        superfish.util.bCloseEvent( document.getElementById("SF_CloseButton"), 2 );
        spsupport.p.prodPage.e = 1;
    }
};

superfish.publisher.fixSuPos = function(top) {
    return (this._fixSuPos ? this._fixSuPos(top) : top);
};

superfish.publisher.report = function(action) {
    if (this._report) {
        this._report(action);
    }
};

superfish.publisher.extractTxt = function(img) {
    if (this._extractTxt) {
        return this._extractTxt(img);
    }
    else {
        return '';
    }
};




       
        
        

        
            superfish.publisher._extractTxt = function(img) {
    if (img) {
        var ch, art, ttl = '';
        for(var pr = img; pr && pr.nodeName != "BODY"; pr = pr.parentNode) {                  
            ch = pr.children;
            if (ch) {
                for (var j=0; j < ch.length; j++) {
                    if (ch[j].nodeName.toLowerCase() == 'h1' || ch[j].nodeName.toLowerCase() == 'h2' || ch[j].nodeName.toLowerCase() == 'h3') {
                        ttl = ch[j].innerText ? ch[j].innerText : ch[j].textContent;
                        ttl = ttl.replace(/[\t\n]+/g, '');
                        art = pr;
                        break;
                    }
                }
                if (art) {
                    break;
                }
            }
        }
        if (!art) {
            art = img.parentNode.parentNode.parentNode;
        }
        if (art) {
            var txt = art.innerText;
            txt = txt ? txt : art.textContent;
            var p = txt.match(/((date|published|posted):\s)?((sun|mon|tue|wed|thu|fri|sat)[a-zA-Z]{0,6},\s)?(jan|feb|mar|apr|may|jun|jul|aug|sep|oct|nov|dec)[a-zA-Z]{0,6}(\s[0-9]{1,2}([a-z]{2})?)?,\s[0-9]{2,4}([\s-]+[0-9]{2}:[0-9]{2}(\s[ap]m)?)?/gi);
            if (p) {
                var ip = txt.indexOf(p[0]);                
                txt = (ip < txt.length/2 ? txt.substring(ip + p[0].length, txt.length) : txt);
            }
            txt = txt.replace(/<[^>]+>|\"|\s\||[\t\n]+|share\s?\:\s?|var\saddthis_pub = \"[a-z]+";|\s-\s/gi, '');
            var t = txt.lastIndexOf(ttl);
            t = (t < txt.length/2 ? t : txt.indexOf(ttl));
            if (t > -1 && t < txt.length/2) {
                txt = txt.substring(t + ttl.length, txt.length);
            }

            txt = txt.replace(/[\s\t]{2,}/g, ' ');
            
            var ret = txt.split(' ');
            ret = ret.slice(0, 51);
            txt = ret.join(' ');
            
            return txt;
        }          
    }
    return '';
};

        
        
          
                    superfish.b.inj( superfish.b.site + "js/base_single_icon.js?ver=" + superfish.b.appVersion , 1, 1 );
                    

            

            

            
            
            
                superfish.sg = {
    sSite: 0,
    offset: 0,
    relpos: 'after',
    showStore: 1,
    cssMainTitle: '',
    itemWidth: 98,
    lines: 1,
    cssMain: '',
    sleepTime: 1000*60*60*24,
    sleepText: ' 24 hours',
    powered1: 'Powered by&nbsp;',
    cssPowered: 'text-align:right; color: #0E774A; font-size: 12px;',
    cssPrompt: 'right:-3px; top:14px;',

    init : function(data) {
        this.obj = sufio.eval(data);
        var prB = sufio.query(this.q);
        if ( prB.length > 0 ) {
            prB = prB[ 0 ].parentNode;
            var box = sufio.coords(prB);             
            var anc = prB.children[this.offset];
            
            var perLine = parseInt(box.w/(this.itemWidth + 8));
            var itemsNum = Math.min(perLine*this.lines, this.obj.length);
            var html = "";
            for (var i = 0; i < itemsNum; i++) {
                if (i != 0 && i%perLine == 0) {
                    html += "<br style='clear: both;' />";
                }
                html += this.getItemHtml(this.obj[i], i);
            }
            this.close();
            this.sg = sufio.place(this.create(html), anc, this.relpos);
            var im;
            for ( i = 0; i < itemsNum; i++) {
                im = sufio.byId( "SF_SRG_IMG_" + i );
                if (im) {
                    im.src = this.obj[i].imagePath;
                }
            }

            spsupport.api.startDOMEnumeration();
        }
    },

    create : function(html) {
        return(
            "<div id = 'SF_SEARCHGET' style='width:100%; margin-bottom: 14px;position: relative;"+this.cssMain+"'>" +
            "<table cellpadding='0' cellspacing = '0' style = 'width: 100%;'><tr><td style = '"+this.cssMainTitle+"'>Visual Search results</td>" +
            "<td style='" + this.cssPowered + "'>"+this.powered1+"<a href = '"+ superfish.b.sgSupportedByLink +"' target='_blank' style='" + this.cssPowered + "'>"+ superfish.b.sgSupportedByText +"</a>&nbsp;&nbsp;<span id = 'SF_SG_CLOSE' style='cursor: pointer;' onclick='superfish.sg.sleep()'>[x]</span></td></tr></table>" +
            html +
            "<br style='clear: both;' />"+
            "</div>");
    },

    getItemHtml : function(item, index) {
        var sp = spsupport.p;
        if (item) {
            var spin = 'SF_loading'+index;
            return(
                "<div style='margin-top: 7px;  overflow: hidden; text-align: left; width: "+ this.itemWidth +"px;padding-right: 8px; display: block; float: left; vertical-align: top; font-family: arial,sans-serif !important; font-size: small !important; line-height: 1.2 !important;'>" +
                "<a href='"+ item.merchURL +"&clickSrc=1' target='_blank' style = 'display: block; width: 82px; height: 82px; text-align: center; vertical-align: middle; border:1px solid #1111CC;'>" +
                "<img id='SF_SRG_IMG_" + index + "' " +sp.sfIcon.evl+ "='-1' sfnoicon='1' style='width:80px; height:80px; display: inline-block; border: none; padding: 1px;display:none;' onload='superfish.sg.showImage(this, \""+spin+"\");' />" +
                "<img id= '" + spin + "' src = '" + sp.iSpin.src + "' style='width:80px; height:80px; display: inline-block; border: none; padding: 1px;' />" +
                "</a>" +
                "<a href='"+ item.merchURL +"&clickSrc=3' target='_blank' style='"+this.cssTitle+"'>"+ item.title +"</a>" +
                "<div style = '"+this.cssPrice+"'>" + item.price + "</div>"+
                (this.showStore ? "<a href='"+ item.merchURL +"&clickSrc=5' target='_blank' style='"+this.cssStore+"'>"+item.merchantName+"</a>" : "") +
                "</div>"
                );
        }
        else {
            return "";
        }
    },

    showImage: function(node, spinId) {
        var spin = sufio.query('#' + spinId, node.parentNode)[0];
        sufio.style(node, 'opacity', '0');
        if (spin) {
            spin.style.display = 'none';
        }
        node.style.display = 'inline';
        sufio.fadeIn({
            node: node,
            duration: 600
        }).play(1);
    },

    close : function() {
        var sg = sufio.byId( "SF_SEARCHGET" );
        if( sg ){
            sufio.destroy(sg);
        }
    },


    sleep : function() { 
        var imUrlDef = spsupport.p.imgPath;
        var bEvt = " onmouseover='superfish.sg.sgBtnEvt(this,1)' onmouseout='superfish.sg.sgBtnEvt(this,0)' onmousedown='superfish.sg.sgBtnEvt(this,2)' onmouseup='superfish.sg.sgBtnEvt(this,4)' ";
        var prompt = "<div id='SF_SG_PAUSE_PROMPT' style='width:220px;height:76px;background:url(" + imUrlDef + "bgPSgP.png);position: absolute;z-index:10; font-size:12px;text-align:center;padding-top:18px;line-height:14px;"+this.cssPrompt+"'>" + superfish.b.sgPrompt + this.sleepText +
        "       <table border='0' cellspacing='0' cellpadding = '0' style='margin:1px auto 0;padding:0;'><tbody><tr><td style='padding:0;'><div id='SF_SG_B_PAUSE_OK' style='margin:2px;width:57px;height:20px;background:url(" + imUrlDef + "bPreSu.png) 0px -20px no-repeat;' " + bEvt + "></div></td>" +
        "       <td style='padding:0;'><div id='SF_SG_B_CLOSE' style='margin:2px;width:57px;height:20px;background:url(" + imUrlDef + "bPreSu.png) 0px 0px no-repeat;' " + bEvt + "></div></td></tr></tbody></table>" +
        "</div>"
        this.pr = sufio.byId( "SF_SG_PAUSE_PROMPT" );
        if (this.pr) {
            this.pr.style.display = 'block';
        }
        else {
            this.pr = sufio.place(prompt, this.sg);
        }
    },

    sgBtnEvt : function (btn, evt) {
        var xP = ( evt == 0 || evt == 4  ? "0" : ( evt == 1 ? "-57" : "-114" ) ) + "px ";
        var yP = (btn.id == "SF_SG_B_PAUSE_OK" ? -20 : 0 ) + "px";
        btn.style.backgroundPosition = xP + yP;
        if( evt == 4){
            this.pr.style.display = "none";
            if (btn.id == "SF_SG_B_PAUSE_OK") {
                superfish.util.sendRequest("{\"cmd\": 2, \"type\": 2, \"cookie\": \""+this.cookie+"\", \"sleep\": \""+this.sleepTime+"\" }");
                this.close();
                spsupport.api.startDOMEnumeration();
            }
        }
    }
};


            
    }
}
