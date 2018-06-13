var
i,c,ay,s,sm,d,dm,l,lm,o,x : longint;
a,b,hasil:array[1..1000009] of longint;
begin
readln(c);
for i:= 1 to c do readln(a[i],b[i]);
for i:= 1 to c do begin
if a[i] > b[i] then begin
ay := a[i] - b[i];
s := ay div 100;
sm := ay mod 100;
d := sm div 20;
dm := sm mod 20;
l := dm div 5;
lm := dm mod 5;
o := lm div 1;
x := s + d + l + o;
hasil[i]:=x;
end;
end;
for i:= 1 to c do writeln(hasil[i]);
end.