var
      i,c,a,u:longint;
      m,p,r,n:integer;
begin
      readln(n);
      for i:=1 to n do begin
            c:=0;
            readln(p,a,m,r);
            u:=r-p;
            inc(c);
            repeat
                  if(p-a>=m) then
                        p:=p-a
                  else p:=m;
                  u:=u-p;
                  inc(c);
            until(u<m);
            if(u>=m) then inc(c);
            writeln(c);
      end;
end.