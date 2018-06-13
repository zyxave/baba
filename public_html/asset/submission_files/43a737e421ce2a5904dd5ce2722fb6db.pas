var
      i,jumlah:integer;
      p,m,a,t:integer;
      r:longint; 
begin
      readln(t);
      if(t<100)then 
      for i := 1 to t do begin
            p:=0; a:=0; m:=0; r:=0; jumlah:=0;
            readln(p,a,m,r);
            if (p<=100) and (t<=100) and (m<=100) and (a<=100) and (r<100000) then 
            repeat
                  r:=r-p;
                  p:=p-a;
                  if p<m then p:=m;
                  inc(jumlah);
            until(r<m);
            writeln(jumlah);
      end;                          
end. 