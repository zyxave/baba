#include <cstdio>
#include <cmath>

using namespace std;

int main(){

	int testcase;
	long long x;

	scanf("%d", &testcase);

	for(int i=0; i<testcase; i++){

		scanf("%lld", &x);
		long long temp = ceil(sqrt(1+(8*x))-1);
		long long ans = (temp/2) + (temp%2) + 1;
		printf("%lld\n", ans);
	}
	return 0;
}