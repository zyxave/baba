var
      n,i,p,a,m,r,e:longint;
begin
      readln(n);
      ;e:=0;
      for i:=1 to n do begin
            readln(p,a,m,r);
            while (r>=p) do begin
                  r:=r-p;
                  p:=p-a;
                  if p<m then p:=m;
                  inc(e);
            end;
            writeln(e);
      end;
end.
