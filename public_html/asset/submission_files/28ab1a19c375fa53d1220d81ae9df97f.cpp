#include <cstdio>
#include <vector>
#include <algorithm>
using namespace std;
vector<int> vertikal;
vector<int> horizontal;
int main(){
int testcase;
int n, m, q;
int x, y;
scanf("%d", &testcase);
for (int i=0; i<testcase; i++){
horizontal.clear();
vertikal.clear();
scanf("%d %d %d", &n, &m, &q);
horizontal.push_back(1);
vertikal.push_back(1);
horizontal.push_back(n);
vertikal.push_back(m);
for (int j=0; j<q; j++){
scanf("%d %d", &x, &y);
horizontal.push_back(x);
vertikal.push_back(y);
}
sort(horizontal.begin(), horizontal.begin()+horizontal.size());
sort(vertikal.begin(), vertikal.begin()+vertikal.size());
int hitungX = 0;
int panjangMaksX = -1;
int panjangMinX = 1000001;
for (int j=1; j<horizontal.size(); j++){
if (horizontal[j]!=horizontal[j-1]){

hitungX++;
if ((horizontal[j]-horizontal[j-1])>panjangMaksX){
panjangMaksX = (horizontal[j]-horizontal[j-1]);
}
if ((horizontal[j]-horizontal[j-1])<panjangMinX){
panjangMinX = (horizontal[j]-horizontal[j-1]);
}
}
}
int hitungY = 0;
int panjangMaksY = -1;
int panjangMinY = 1000001;
for (int j=1; j<vertikal.size(); j++){
if (vertikal[j]!=vertikal[j-1]){
hitungY++;
if ((vertikal[j]-vertikal[j-1])>panjangMaksY){
panjangMaksY = (vertikal[j]-vertikal[j-1]);
}
if ((vertikal[j]-vertikal[j-1])<panjangMinY){
panjangMinY = (vertikal[j]-vertikal[j-1]);
}
}
}

long long totalLand = hitungX*hitungY;
long long areaMax = panjangMaksX*panjangMaksY;
long long areaMin = panjangMinX*panjangMinY;
printf("%lld %lld %lld\n", totalLand, areaMin, areaMax);
}
return 0;
}