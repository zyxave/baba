uses crt;
var a,b,c,d,e,f,g,h,i,k,l : integer;
        j: array[1..100] of integer;
begin
readln(a);
for b:= 1 to a do
  begin
   readln(c,d);
   f:=c-d;
   e:=f div 100; f:=f mod 100;
   g:=f div 20; f:=f mod 20;
   h:=f div 5;  f:=f mod 5;
   i:=f div 1;
   K:=e+g+h+i;
writeln(k);
end;
readln;
end.