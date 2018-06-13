#include<stdio.h>
#define MOD 1000000007
#include<math.h>
using namespace std;
int main ()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
		int n;
		scanf("%d",&n);
		int arr[n];
		for(int a=0;a<n;a++)
			scanf("%d",&arr[a]);
		int banyak=0;
		int banyak2=0;
		long long hasil=0;
		for(int a=0;a<n;a++)
		{
			banyak+=arr[a];
			banyak2+=arr[n-a-1];
			hasil+=(banyak2-banyak)*pow(2,a);
		}
		hasil=hasil%1000000007;
		printf("%lld\n",hasil);		
	}
}
