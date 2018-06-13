var
h,d,b,u,j : integer;
begin
readln(h,d,b,u);
if (h > b) and (h < u) then begin
u := u - h;
j := j + 1;
h := h - d;
writeln(j);
readln;
end.