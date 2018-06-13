var
      i,jumlah:integer;
      p,m,a,t:integer;
      r:longint; 
begin
      readln(t);
      for i := 1 to t do begin
            p:=0; a:=0; m:=0; r:=0; jumlah:=0;
            readln(p,a,m,r);
            WHILE (r>=P) do begin
                  r:=-p+r;
                  p:=-a+p;
                  if p<m then p:=m;
                  inc(jumlah);
            end;
            writeln(jumlah);
      end;                          
end. 

