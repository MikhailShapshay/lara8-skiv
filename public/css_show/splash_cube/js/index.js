var canvas,ctx,q1,q2,q3,typ;
canvas = document.getElementsByTagName('canvas')[0];
ctx = canvas.getContext('2d');
canvas.width=canvas.height=300;
qset();
pcu();

function qset(){
    var a,b,c;
    a=[2,3,5,7,11,13,17,19,23,29,31,37,41,43];
    b=(Math.random()*a.length)|0;
  if(Math.random()<0.4)b=(Math.random()*2)|0;
    q1=a[b];
    a[b]=a[a.length-1];
    a.pop();
    for(c=0;c<100;c++){
        b=(Math.random()*a.length)|0;
        q2=a[b];
        a[b]=a[a.length-1];
        a.pop();
        q3=q1*q2;
        if(q3>80 && q3<160)break;
    }
    typ=(Math.random()<0.2);
}

function pcu(){
    var a,b,c,d,e,p,p2,x,y,z,x1,y1,z1,r,r2,tim,gen,mc,mc2,ms,ms2;
    ctx.globalCompositeOperation = "source-over";
    ctx.fillStyle="rgb(0,0,0)";
    ctx.fillRect(0,0,300,300);
    ctx.globalCompositeOperation = "lighter";
    ctx.strokeStyle="hsla(222,60%,60%,0.5)";
    ctx.fillStyle="hsla(222,60%,60%,"+(17/q3)+")";
    gen=10;
    tim=new Date().getTime()/150;
    
    p2=[];
    for(c=0;c<q3;c++){
        p=[];
        r=tim/13+Math.PI*2/q1*c;
        r2=tim/17+Math.PI*2/q2*c;
        x1=y1=z1=0;
        d=r+r2;
        for(a=0;a<30;a++){
            y=Math.sin(r);
            z=Math.cos(r);
            x=Math.cos(r2)*z;
            z=Math.sin(r2)*-(z);
            x1+=x;y1+=y;z1+=z;
            p.push([x1,y1,z1]);
            b=tim/11*((a)%Math.PI);
            if(typ)b+=d;//+r+r2;
            r+=Math.cos(b)/2;
            r2+=Math.sin(b)/2;
        }
        p2.push(p);
    }
    
    ms=Math.sin(tim/29);
    mc=Math.cos(tim/29);
    ms2=Math.sin(tim/23);
    mc2=Math.cos(tim/23);
    for(c=0;c<p2.length+1;c++){
        p=p2[c%p2.length];
        d=[];
        for(a=0;a<p.length;a++){
            x=p[a][0];y=p[a][1];z=p[a][2];
            if(x>gen)x=gen;
            if(x<-gen)x=-gen;
            if(y>gen)y=gen;
            if(y<-gen)y=-gen;
            if(z>gen)z=gen;
            if(z<-gen)z=-gen;
            y1=y*ms+z*mc;
            z1=y*mc-z*ms;
            x1=x*ms2+z1*mc2;
            z=x*mc2-z1*ms2;
            z=1+z/55;
            x=200+x1*10*z;
            y=200+y1*10*z;
            d.push([x,y]);
        }
        
        if(c%2==1){
            for(a=0;a<d.length;a++)ctx.lineTo(d[a][0],d[a][1]);
            ctx.fill();
        }
        ctx.beginPath();
        for(a=d.length-1;a>0;a--)ctx.lineTo(d[a][0],d[a][1]);
        ctx.stroke();
    }
    requestAnimationFrame(pcu);
}