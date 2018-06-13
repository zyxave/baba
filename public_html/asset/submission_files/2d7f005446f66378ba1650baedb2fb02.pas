var
      i,jumlah:integer;
      p,m,a,t:shortint;
      r:longint; 
begin
      readln(t);
      for i := 1 to t do begin
            p:=0; a:=0; m:=0; r:=0; jumlah:=0;
            readln(p,a,m,r);
            repeat
                  r:=r-p;
                  p:=p-a;
                  if p<m then p:=m;
                  inc(jumlah);
            until(r<m);
            writeln(jumlah);
      end;                          
end. 