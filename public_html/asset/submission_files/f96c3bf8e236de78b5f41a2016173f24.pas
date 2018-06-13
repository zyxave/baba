var
      n,tc,i,min,max:longint;
      s:ansistring;
      data: array['a'..'z'] of longint;
      sapi:array[1..100023] of longint;      
      j:char;
begin
      readln(n);
      for tc:=1 to n do begin 
            readln(s);
            min:=1000000;
            max:=-1000000;
            for j:='a' to 'z' do begin
                  data[j]:=0;
            end;
            for i:=1 to 100000 do begin
                  sapi[i]:=0;
            end;                                    
            for i:=1 to length(s) do begin
                  inc(data[s[i]]);
            end;
            for j:='a' to 'z' do begin
                  if (data[j]<>0) then begin
                        inc(sapi[data[j]]);
                        if (data[j]<min) then min:=data[j];
                        if (data[j]>max) then max:=data[j];
                  end;
            end;
            if (max=min) then writeln('YES')
            else if ((max-min=abs(1)) and  (sapi[max]=1)) then writeln('YES')
            else if ((min=1) and (sapi[min]=1)) then writeln('YES')
            else writeln('NO');
            
      end;
end.