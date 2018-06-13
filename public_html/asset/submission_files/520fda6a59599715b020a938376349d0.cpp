#include <cstdio>
#include <cstring>
using namespace std;
long long cek[300][1122][16];
int prime[300];
int hitung;
long long dp(int idx, int n, int k){
	if (n==0 && k==0){
		return 1;
	}
	else if (cek[idx][n][k]!=-1){
		return cek[idx][n][k];  // kalo udah pernah kunjungi return nilai itu
	} 
	else if (k>0 && n>0){
		long long ans=0;
		for (int i=idx+1; i<=hitung; i++){
			if (n-prime[i]>=0){
				ans+=(dp(i, n-prime[i], k-1));      //kalo dikurangi gak minus bisa jalan 
			}
			else 
				break;		    
		}
		cek[idx][n][k]=ans;
		return ans;
	}
	return 0;                         //return hasilnya
}
int main(){
	int testcase;
	int n, k;
	bool primeOrNot;
	long long ans;
	// bikin bilangan prima
	prime[0]=2;
	hitung=0;
	for (int i=3; i<=1120; i++){
		primeOrNot=true;        
		for (int j=2; j<=(i/2); j++){
			if (i%j==0){
				primeOrNot=false;   //bukan prima
				break;
			}
		}
		if (primeOrNot==true){
			hitung++;
			prime[hitung]=i;        //tandain prima
		}
	}
	memset(cek, -1, sizeof(cek));    //bikin semua jadi belum dikujungi
	scanf("%d", &testcase);
	for (int i=0; i<testcase; i++){
		scanf("%d %d", &n, &k);
		long long ans=0;
		for (int j=0; j<=hitung; j++) {
			if (n-prime[j]>=0)
				ans+=(dp(j, n-prime[j], k-1));    //kalo dikurangi gak minus bisa jalan 
		}
		printf("%lld\n", ans);
	
	}
	
	return 0;
}
