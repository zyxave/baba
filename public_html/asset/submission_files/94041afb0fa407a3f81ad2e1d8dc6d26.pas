var T,N,M,P : longword; kasus: [1..1000] of longword; var i,j,k,x,y: longint; var jajan: [1..1000] of longint;
var kasus2:[1..1000] of longint;
begin
readln(T);

for i:=1 to T do begin
readln(N,M);
kasus[i]:=N;
jajan[i]:=M;
        for j:=1 to N do begin
        readln(P);
        kasus2[j]:=P;
        end;
end;

for k:=1 to T do begin
end;
end.

