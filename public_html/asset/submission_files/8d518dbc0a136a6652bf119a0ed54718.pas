var
      i,z,a,s,r:longint;
      m,p,T:integer;
begin
      readln(T);
      for i:=1 to T do begin
            z:=0;
            readln(p,a,m,r);
            if(p>r) then writeln('0')
            else begin
                  s:=r-p;
                  z:=z+1;
                  repeat
                  if(p-a>=m) then
                        p:=p-a
                  else p:=m;
                  s:=s-p;
                  z:=z+1;
                  until(s<m);
                  writeln(z);
            end;
      end;
end.