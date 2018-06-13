var T,i,j,k:longword; N:longword; lampu:array[1..9999] of longword;a,b,c:longword;
begin

readln(T);
for i:=1 to T do begin
        readln(N);
        for j:=1 to N do begin
                lampu[j]:=1;
        end;

        a:=2;
        b:=2;
        c:=2;

        while a<=N do begin
                while b<=N do begin
                        if lampu[a]=1 then begin
                        lampu[a]:=0;
                        end else begin
                        lampu[a]:=1;
                        end;
                a:=a*b;
                b:=b+1;
                end;
        a:=c+1;
        c:=c+1;
        b:=2;
        end;

for k:=1 to N do begin
        if lampu[k]=1 then begin
                writeln(k);
        end;
end;
end;
readln;
end.




