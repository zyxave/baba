var
      a,b,c,e,f,g,x,y,z,d,o,p,q,i,n:longint;
begin
      readln(n);
            for i:=1 to n do begin
            readln(x,y,z);
            readln(a,b,c);
            readln(e,f,g);
            d:=a+b+c+e+f+g;
            o:=x*y;
            p:=d-o;
            q:=p*z;
            if p<0 then writeln('0')
            else writeln(q);
      end;
end.