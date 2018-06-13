#include <cstdio>
#include <iostream>
#include <string>

using namespace std;

int digitSum(long long n){
	int ans =0;

	while (n>0){

		ans += n%10;

		n/=10;
	}

	return ans;
}

int main(){

	long long n, k;

	scanf("%lld %lld", &n, &k);

	int hitung = digitSum(n)*k;

	while (hitung>=10){
		hitung = digitSum(hitung);
	}

	printf("%d\n", hitung);
}