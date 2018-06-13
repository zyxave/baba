var
      i,c,a,u,r:longint;
      m,p,n:integer;
begin
      readln(n);
      for i:=1 to n do begin
            c:=0;
            readln(p,a,m,r);
            if(p>r) then writeln('0')
            else begin
                  u:=r-p;
                  inc(c);
                  repeat
                        if(p-a>=m) then
                              p:=p-a
                        else p:=m;
                        u:=u-p;
                        inc(c);
                  until(u<m);
                  writeln(c);
            end;
      end;
end.