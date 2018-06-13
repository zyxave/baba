var
m,i,j,a,tmp,t,d:longint;
hasil:array[0..99999] of longint;
y,x : array[0..10009] of smallint;
f : shortint;

function duap(n:longint):longint;
var c:longint;
begin
    if n=0 then duap:=1 else
    duap:=duap(n-1)*2;
end;

begin
    readln(f);
    for d:= 1 to f do begin readln(y[d]); hasil[d]:=0;
    for t:= 1 to y[d] do read(x[t]);
    for i:= 1 to y[d]-1 do
    for j:= 1 to y[d]-1 do begin

        if x[j]<x[j+1] then begin
             tmp:=x[j];
             x[j]:=x[j+1];
             x[j+1]:= tmp;
         end;
    end;
    for i:= 1 to y[d]-1 do
    for j:= i+1 to y[d] do begin
        m:= j-i-1;
        hasil[d]:= (x[i]- x[j])*duap(m)+hasil[d];
    end;
    end;
    for i:=1 to f do writeln(hasil[i]);
end.
